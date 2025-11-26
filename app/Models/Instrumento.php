<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria',
        'descripcion',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_instrumento');
    }

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}

