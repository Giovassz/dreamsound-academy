<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use Illuminate\Http\Request;

class InstrumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        $instrumentos = Instrumento::paginate(15);
        return view('admin.instrumentos.index', compact('instrumentos'));
    }

    public function create()
    {
        return view('admin.instrumentos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Instrumento::create($validated);

        return redirect()->route('admin.instrumentos.index')
            ->with('success', 'Instrumento creado exitosamente.');
    }

    public function edit(Instrumento $instrumento)
    {
        return view('admin.instrumentos.edit', compact('instrumento'));
    }

    public function update(Request $request, Instrumento $instrumento)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $instrumento->update($validated);

        return redirect()->route('admin.instrumentos.index')
            ->with('success', 'Instrumento actualizado exitosamente.');
    }

    public function destroy(Instrumento $instrumento)
    {
        $instrumento->update(['is_active' => false]);
        return redirect()->route('admin.instrumentos.index')
            ->with('success', 'Instrumento desactivado exitosamente.');
    }
}

