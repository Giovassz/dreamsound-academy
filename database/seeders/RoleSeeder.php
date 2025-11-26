<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'Administrador del sistema'],
            ['name' => 'staff', 'description' => 'Personal de la escuela'],
            ['name' => 'client', 'description' => 'Cliente/Alumno'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

