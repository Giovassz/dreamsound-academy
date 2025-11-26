@extends('layouts.app')

@section('title', 'Gestión de Instrumentos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="bi bi-music-note-list"></i>
        <span>Gestión de Instrumentos</span>
    </h1>
    <a href="{{ route('admin.instrumentos.create') }}" class="btn btn-info btn-lg">
        <i class="bi bi-plus-circle"></i> Nuevo Instrumento
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-list-ul"></i> Listado de Instrumentos</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($instrumentos as $instrumento)
                    <tr>
                        <td><strong>#{{ $instrumento->id }}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-music-note me-2" style="font-size: 1.5rem; color: #0288d1;"></i>
                                <span><strong>{{ $instrumento->nombre }}</strong></span>
                            </div>
                        </td>
                        <td><span class="badge bg-secondary">{{ $instrumento->categoria }}</span></td>
                        <td>{{ $instrumento->descripcion ? \Illuminate\Support\Str::limit($instrumento->descripcion, 50) : 'N/A' }}</td>
                        <td>
                            @if($instrumento->is_active)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle"></i> Activo
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="bi bi-x-circle"></i> Inactivo
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.instrumentos.edit', $instrumento) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.instrumentos.destroy', $instrumento) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Desactivar este instrumento?')" title="Desactivar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No hay instrumentos registrados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($instrumentos->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $instrumentos->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
