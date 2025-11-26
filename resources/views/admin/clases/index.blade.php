@extends('layouts.app')

@section('title', 'Gestión de Clases')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="bi bi-calendar-event"></i>
        <span>Gestión de Clases</span>
    </h1>
    <a href="{{ route('admin.clases.create') }}" class="btn btn-warning btn-lg">
        <i class="bi bi-plus-circle"></i> Nueva Clase
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-list-ul"></i> Listado de Clases</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Instrumento</th>
                        <th>Día</th>
                        <th>Horario</th>
                        <th>Alumnos</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clases as $clase)
                    <tr>
                        <td><strong>#{{ $clase->id }}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-calendar-check me-2" style="font-size: 1.5rem; color: #f57c00;"></i>
                                <span><strong>{{ $clase->nombre }}</strong></span>
                            </div>
                        </td>
                        <td><span class="badge bg-info">{{ $clase->instrumento->nombre }}</span></td>
                        <td><span class="badge bg-secondary">{{ $clase->dia_semana }}</span></td>
                        <td>
                            <i class="bi bi-clock"></i> 
                            {{ substr($clase->hora_inicio, 0, 5) }} - {{ substr($clase->hora_fin, 0, 5) }}
                        </td>
                        <td>
                            <span class="badge bg-primary">
                                {{ $clase->alumnos->count() }} / {{ $clase->capacidad_maxima }}
                            </span>
                        </td>
                        <td>
                            @if($clase->is_active)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle"></i> Activa
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="bi bi-x-circle"></i> Inactiva
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('admin.clases.edit', $clase) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.clases.destroy', $clase) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Desactivar esta clase?')" title="Desactivar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No hay clases registradas</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($clases->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $clases->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
