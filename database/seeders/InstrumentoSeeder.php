<?php

namespace Database\Seeders;

use App\Models\Instrumento;
use Illuminate\Database\Seeder;

class InstrumentoSeeder extends Seeder
{
    public function run(): void
    {
        $instrumentos = [
            ['nombre' => 'Piano', 'categoria' => 'Teclado', 'descripcion' => 'Instrumento de teclado'],
            ['nombre' => 'Guitarra', 'categoria' => 'Cuerda', 'descripcion' => 'Instrumento de cuerda pulsada'],
            ['nombre' => 'Violín', 'categoria' => 'Cuerda', 'descripcion' => 'Instrumento de cuerda frotada'],
            ['nombre' => 'Flauta', 'categoria' => 'Viento', 'descripcion' => 'Instrumento de viento madera'],
            ['nombre' => 'Batería', 'categoria' => 'Percusión', 'descripcion' => 'Instrumento de percusión'],
            ['nombre' => 'Saxofón', 'categoria' => 'Viento', 'descripcion' => 'Instrumento de viento metal'],
        ];

        foreach ($instrumentos as $instrumento) {
            Instrumento::create($instrumento);
        }
    }
}

