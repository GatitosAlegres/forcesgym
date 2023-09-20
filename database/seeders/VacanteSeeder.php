<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vacante;

class VacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vacantes = ['Personal de limpieza', 'Entrenador', 'Nutricionista', 'Recepcionista'];

        foreach ($vacantes as $vacante) {
            Vacante::create([
                'nombre' => $vacante,
            ]);
        }
    }
}
