<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Membresias;

class MembresiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $nombres = [
            'Juan Pérez',
            'María González',
            'Luis Martínez',
            'Ana Rodríguez',
            'Pedro Sánchez',
            'Laura López',
            'Carlos Torres',
            'Sofía Ramírez',
            'Diego Hernández',
            'Valentina García',
            'Javier Fernández',
            'Camila Díaz',
            'Andrés Ruiz',
            'Isabella Jiménez',
            'Miguel Castro',
        ];

        $tiposMembresia = [1, 2, 3];

        for ($i = 0; $i < 15; $i++) {
            $nombreCliente = $nombres[array_rand($nombres)];
            $descripcion = 'Descripción corta ' . $i;
            $tipoMembresia = $tiposMembresia[array_rand($tiposMembresia)];
            $activo = (bool)rand(0, 1);
            $fecha_inicio = date('Y-m-d H:i:s', rand(strtotime('2023-01-01'), strtotime('2023-10-18')));
            $fecha_fin = date('Y-m-d H:i:s', rand(strtotime($fecha_inicio), strtotime('2023-10-18')));

            // Definir el precio según el tipo de membresía
            switch ($tipoMembresia) {
                case 1:
                    $precio = 7;
                    break;
                case 2:
                    $precio = 120;
                    break;
                case 3:
                    $precio = 1440;
                    break;
                default:
                    $precio = 0;
            }

            Membresias::create([
                'nombreCliente' => $nombreCliente,
                'tipo_membresia_id' => $tipoMembresia,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'activo' => $activo,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
            ]);
        }
    }
}

