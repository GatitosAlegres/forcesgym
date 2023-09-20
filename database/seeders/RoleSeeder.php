<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            # Sales subsystem
            'personal-ventas',
            'personal-logistica',
            'cliente',
            # Humman Resources subsystem
            'candidato',
            'jefe-RRHH',
            'tecnico-seleccion',
            # Enrollments subsystem
            'recepcionista',
            'cajero',
            'entrenador',
            'nutricionista',
            # Courses subsystem
            'gerente-de-marketing',
            # Purchases subsystem
            'almacenero',
            'coordinador-compras'
        ];

        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::create([
                'name' => $role,
            ]);
        }
    }
}
