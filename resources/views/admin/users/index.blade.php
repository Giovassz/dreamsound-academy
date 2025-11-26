@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="bi bi-people"></i>
        <span>Gestión de Usuarios</span>
    </h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle"></i> Nuevo Usuario
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-list-ul"></i> Listado de Usuarios</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td><strong>#{{ $user->id }}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle me-2" style="font-size: 1.5rem; color: #3949ab;"></i>
                                <span>{{ $user->name }}</span>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ ucfirst($user->role->name) }}</span>
                        </td>
                        <td>
                            @if($user->is_active)
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
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Desactivar este usuario?')" title="Desactivar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted mt-3">No hay usuarios registrados</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
