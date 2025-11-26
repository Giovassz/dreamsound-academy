@extends('layouts.app')

@section('title', 'Gestión de Alumnos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="bi bi-person-badge"></i>
        <span>Gestión de Alumnos</span>
    </h1>
    <a href="{{ route('admin.alumnos.create') }}" class="btn btn-success btn-lg">
        <i class="bi bi-plus-circle"></i> Nuevo Alumno
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-list-ul"></i> Listado de Alumnos</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Completo</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Instrumentos</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alumnos as $alumno)
                    <tr>
                        <td><strong>#{{ $alumno->id }}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle me-2" style="font-size: 1.5rem; color: #2e7d32;"></i>
                                <span>{{ $alumno->nombre_completo }}</span>
                            </div>
                        </td>
                        <td>{{ $alumno->email }}</td>
                        <td>{{ $alumno->telefono ?? 'N/A' }}</td>
                        <td>
                            @forelse($alumno->instrumentos as $instrumento)
                                <span class="badge bg-info me-1">{{ $instrumento->nombre }}</span>
                            @empty
                                <span class="text-muted">Sin instrumentos</span>
                            @endforelse
                            <br>
                            <small class="text-muted">
                                <i class="bi bi-calendar-event"></i> 
                                {{ $alumno->clases->count() }} clase(s)
                            </small>
                        </td>
                        <td>
                            @if($alumno->is_active)
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
                                <a href="{{ route('admin.alumnos.edit', $alumno) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.alumnos.destroy', $alumno) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Desactivar este alumno?')" title="Desactivar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No hay alumnos registrados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($alumnos->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $alumnos->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
