<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'instrumento_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'capacidad_maxima',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function instrumento()
    {
        return $this->belongsTo(Instrumento::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_clase');
    }
}

