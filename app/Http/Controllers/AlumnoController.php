<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Instrumento;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        $alumnos = Alumno::with('instrumentos')->paginate(15);
        return view('admin.alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $instrumentos = Instrumento::where('is_active', true)->get();
        return view('admin.alumnos.create', compact('instrumentos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:alumnos',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string',
            'instrumentos' => 'nullable|array',
            'instrumentos.*' => 'exists:instrumentos,id',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $instrumentos = $validated['instrumentos'] ?? [];
        unset($validated['instrumentos']);

        $alumno = Alumno::create($validated);
        $alumno->instrumentos()->sync($instrumentos);

        return redirect()->route('admin.alumnos.index')
            ->with('success', 'Alumno creado exitosamente.');
    }

    public function edit(Alumno $alumno)
    {
        $instrumentos = Instrumento::where('is_active', true)->get();
        return view('admin.alumnos.edit', compact('alumno', 'instrumentos'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:alumnos,email,' . $alumno->id,
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'direccion' => 'nullable|string',
            'instrumentos' => 'nullable|array',
            'instrumentos.*' => 'exists:instrumentos,id',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $instrumentos = $validated['instrumentos'] ?? [];
        unset($validated['instrumentos']);

        $alumno->update($validated);
        $alumno->instrumentos()->sync($instrumentos);

        return redirect()->route('admin.alumnos.index')
            ->with('success', 'Alumno actualizado exitosamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->update(['is_active' => false]);
        return redirect()->route('admin.alumnos.index')
            ->with('success', 'Alumno desactivado exitosamente.');
    }
}

