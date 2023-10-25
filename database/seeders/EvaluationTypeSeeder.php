<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EvaluationType;

class EvaluationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluations = ['Psicológico', 'Competencias técnicas', '360 grados'];

        foreach ($evaluations as $evaluation) {
            EvaluationType::create([
                'name' => $evaluation,
            ]);
        }
    }
}
