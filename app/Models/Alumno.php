<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'fecha_nacimiento',
        'direccion',
        'user_id',
        'is_active',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'alumno_clase');
    }

    public function instrumentos()
    {
        return $this->belongsToMany(Instrumento::class, 'alumno_instrumento');
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->apellido}";
    }
}

