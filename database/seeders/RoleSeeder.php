<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends ShieldSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'administrador',
            'jefe-RRHH',
            'recepcionista',
            'gerente-general',
            'gerente-de-operaciones',
        ];

        $rolesArray = [];

        foreach ($roles as $role) {
            $roleObject = [
                'name' => $role,
                'guard_name' => 'web',
                'permissions' => []
            ];

            $rolesArray[] = $roleObject;
        }

        $rolesWithPermissions = json_encode($rolesArray, JSON_PRETTY_PRINT);

        ShieldSeeder::makeRolesWithPermissions($rolesWithPermissions);
    }
}
