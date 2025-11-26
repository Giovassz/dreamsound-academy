@extends('layouts.app')

@section('title', 'Editar Clase')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4><i class="bi bi-pencil"></i> Editar Clase</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.clases.update', $clase) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $clase->nombre) }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $clase->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instrumento_id" class="form-label">Instrumento</label>
                        <select class="form-select @error('instrumento_id') is-invalid @enderror" 
                                id="instrumento_id" name="instrumento_id" required>
                            <option value="">Seleccione un instrumento</option>
                            @foreach($instrumentos as $instrumento)
                                <option value="{{ $instrumento->id }}" 
                                        {{ old('instrumento_id', $clase->instrumento_id) == $instrumento->id ? 'selected' : '' }}>
                                    {{ $instrumento->nombre }} ({{ $instrumento->categoria }})
                                </option>
                            @endforeach
                        </select>
                        @error('instrumento_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dia_semana" class="form-label">Día de la Semana</label>
                            <select class="form-select @error('dia_semana') is-invalid @enderror" 
                                    id="dia_semana" name="dia_semana" required>
                                <option value="">Seleccione un día</option>
                                @php
                                    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                                @endphp
                                @foreach($dias as $dia)
                                    <option value="{{ $dia }}" 
                                            {{ old('dia_semana', $clase->dia_semana) == $dia ? 'selected' : '' }}>
                                        {{ $dia }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dia_semana')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="hora_inicio" class="form-label">Hora Inicio</label>
                            <input type="time" class="form-control @error('hora_inicio') is-invalid @enderror" 
                                   id="hora_inicio" name="hora_inicio" 
                                   value="{{ old('hora_inicio', $clase->hora_inicio ? substr($clase->hora_inicio, 0, 5) : '') }}" required>
                            @error('hora_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="hora_fin" class="form-label">Hora Fin</label>
                            <input type="time" class="form-control @error('hora_fin') is-invalid @enderror" 
                                   id="hora_fin" name="hora_fin" 
                                   value="{{ old('hora_fin', $clase->hora_fin ? substr($clase->hora_fin, 0, 5) : '') }}" required>
                            @error('hora_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="capacidad_maxima" class="form-label">Capacidad Máxima</label>
                        <input type="number" class="form-control @error('capacidad_maxima') is-invalid @enderror" 
                               id="capacidad_maxima" name="capacidad_maxima" 
                               value="{{ old('capacidad_maxima', $clase->capacidad_maxima) }}" min="1" required>
                        @error('capacidad_maxima')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alumnos</label>
                        <div class="row">
                            @foreach($alumnos as $alumno)
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="alumnos[]" value="{{ $alumno->id }}" 
                                           id="alumno_{{ $alumno->id }}"
                                           {{ in_array($alumno->id, old('alumnos', $clase->alumnos->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="alumno_{{ $alumno->id }}">
                                        {{ $alumno->nombre_completo }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                               {{ old('is_active', $clase->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Clase Activa</label>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar
                        </button>
                        <a href="{{ route('admin.clases.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

