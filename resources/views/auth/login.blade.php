@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5">
        <div class="card shadow-lg">
            <div class="card-header text-center py-4">
                <img src="{{ asset('images/logo.png') }}" alt="DreamSound Academy" height="80" class="mb-3" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <i class="bi bi-music-note-beamed" style="font-size: 4rem; color: #ffc107; display: none;"></i>
                <h3 class="mt-3 mb-0" style="color: white; font-weight: 700;">DreamSound Academy</h3>
                <p class="mb-0 mt-2" style="color: rgba(255,255,255,0.9);">Iniciar Sesión</p>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">
                            <i class="bi bi-envelope"></i> Email
                        </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="tu@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">
                            <i class="bi bi-lock"></i> Contraseña
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required placeholder="••••••••">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                        </button>
                    </div>
                </form>

                <hr class="my-4">
                <div class="text-center">
                    <p class="mb-0 text-muted">¿No tienes cuenta?</p>
                    <a href="{{ route('register') }}" class="text-decoration-none fw-semibold" style="color: #3949ab;">
                        <i class="bi bi-person-plus"></i> Regístrate aquí
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
