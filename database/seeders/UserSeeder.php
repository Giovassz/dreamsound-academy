<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $staffRole = Role::where('name', 'staff')->first();
        $clientRole = Role::where('name', 'client')->first();

        // Admin user
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@escuela.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'is_active' => true,
        ]);

        // Staff users
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'staff@escuela.com',
            'password' => Hash::make('password'),
            'role_id' => $staffRole->id,
            'is_active' => true,
        ]);

        // Client users
        User::create([
            'name' => 'María García',
            'email' => 'cliente@escuela.com',
            'password' => Hash::make('password'),
            'role_id' => $clientRole->id,
            'is_active' => true,
        ]);
    }
}

