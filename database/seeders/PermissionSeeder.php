<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            "crear-entrevista",
            "editar-entrevista",
            "eliminar-entrevista",
            "ver-entrevista",
            "crear-campaña",
            "editar-campaña",
            "eliminar-campaña",
            "ver-campaña",
            "crear-usuario",
            "editar-usuario",
            "eliminar-usuario",
            "ver-usuario",
            "crear-rol",
            "editar-rol",
            "eliminar-rol",
            "ver-rol",
            "crear-permiso",
            "editar-permiso",
            "eliminar-permiso",
            "ver-permiso",
            "matricular-cliente",
            "editar-matricula",
            "eliminar-matricula",
            "ver-matricula",
            "crear-venta",
            "editar-venta",
            "eliminar-venta",
            "ver-venta",
            "crear-compra",
            "editar-compra",
            "eliminar-compra",
            "ver-compra",
            "crear-proveedor",
            "editar-proveedor",
            "eliminar-proveedor",
            "ver-proveedor",
            "crear-producto",
            "editar-producto",
            "eliminar-producto",
            "ver-producto",
            "crear-servicio",
            "editar-servicio",
            "eliminar-servicio",
            "ver-servicio",
            "crear-contrato",
            "editar-contrato",
            "eliminar-contrato",
            "ver-contrato",
            "crear-actividad",
            "editar-actividad",
            "eliminar-actividad",
            "ver-actividad",
            "crear-horario",
            "editar-horario",
            "eliminar-horario",
            "ver-horario"
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create([
                'name' => $permission,
            ]);
        }
    }
}
