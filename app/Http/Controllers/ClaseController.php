<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Instrumento;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        $clases = Clase::with('instrumento', 'alumnos')->paginate(15);
        return view('admin.clases.index', compact('clases'));
    }

    public function create()
    {
        $instrumentos = Instrumento::where('is_active', true)->get();
        $alumnos = Alumno::where('is_active', true)->get();
        return view('admin.clases.create', compact('instrumentos', 'alumnos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'instrumento_id' => 'required|exists:instrumentos,id',
            'dia_semana' => 'required|string|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'capacidad_maxima' => 'required|integer|min:1',
            'alumnos' => 'nullable|array',
            'alumnos.*' => 'exists:alumnos,id',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $alumnos = $validated['alumnos'] ?? [];
        unset($validated['alumnos']);

        // Validar capacidad máxima
        if (count($alumnos) > $validated['capacidad_maxima']) {
            return back()->withErrors([
                'alumnos' => 'El número de alumnos seleccionados (' . count($alumnos) . ') excede la capacidad máxima (' . $validated['capacidad_maxima'] . ').'
            ])->withInput();
        }

        $clase = Clase::create($validated);
        $clase->alumnos()->sync($alumnos);

        return redirect()->route('admin.clases.index')
            ->with('success', 'Clase creada exitosamente.');
    }

    public function edit(Clase $clase)
    {
        $instrumentos = Instrumento::where('is_active', true)->get();
        $alumnos = Alumno::where('is_active', true)->get();
        return view('admin.clases.edit', compact('clase', 'instrumentos', 'alumnos'));
    }

    public function update(Request $request, Clase $clase)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'instrumento_id' => 'required|exists:instrumentos,id',
            'dia_semana' => 'required|string|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'capacidad_maxima' => 'required|integer|min:1',
            'alumnos' => 'nullable|array',
            'alumnos.*' => 'exists:alumnos,id',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $alumnos = $validated['alumnos'] ?? [];
        unset($validated['alumnos']);

        // Validar capacidad máxima
        if (count($alumnos) > $validated['capacidad_maxima']) {
            return back()->withErrors([
                'alumnos' => 'El número de alumnos seleccionados (' . count($alumnos) . ') excede la capacidad máxima (' . $validated['capacidad_maxima'] . ').'
            ])->withInput();
        }

        $clase->update($validated);
        $clase->alumnos()->sync($alumnos);

        return redirect()->route('admin.clases.index')
            ->with('success', 'Clase actualizada exitosamente.');
    }

    public function destroy(Clase $clase)
    {
        $clase->update(['is_active' => false]);
        return redirect()->route('admin.clases.index')
            ->with('success', 'Clase desactivada exitosamente.');
    }
}

