<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoEvaluacion;

class TipoEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluaciones = ['Examen de conocimientos', 'Examen psicologico', 'Examen medico'];

        foreach ($evaluaciones as $evaluacion) {
            TipoEvaluacion::create([
                'nombre' => $evaluacion,
            ]);
        }
    }
}
