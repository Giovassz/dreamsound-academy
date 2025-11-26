@extends('layouts.app')

@section('title', 'Dashboard - Cliente')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="page-title">
            <i class="bi bi-person-circle"></i>
            <span>Mi Dashboard</span>
        </h1>
        <p class="text-muted">Bienvenido, <strong>{{ auth()->user()->name }}</strong></p>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Información Personal</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="mb-1 text-muted">Nombre Completo</p>
                        <h5>{{ auth()->user()->name }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="mb-1 text-muted">Email</p>
                        <h5>{{ auth()->user()->email }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="mb-1 text-muted">Rol</p>
                        <span class="badge bg-primary" style="font-size: 1rem; padding: 0.5rem 1rem;">
                            {{ ucfirst(auth()->user()->role->name) }}
                        </span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="mb-1 text-muted">Estado de Cuenta</p>
                        @if(auth()->user()->is_active)
                            <span class="badge bg-success" style="font-size: 1rem; padding: 0.5rem 1rem;">Activo</span>
                        @else
                            <span class="badge bg-danger" style="font-size: 1rem; padding: 0.5rem 1rem;">Inactivo</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-music-note-beamed"></i> DreamSound Academy</h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('images/logo.png') }}" alt="DreamSound Academy" height="100" class="mb-3" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <i class="bi bi-music-note-beamed" style="font-size: 4rem; color: #3949ab; margin-bottom: 1rem; display: none;"></i>
                <p class="text-muted">Sistema de gestión para alumnos, instrumentos y clases.</p>
            </div>
        </div>
    </div>
</div>
@endsection
