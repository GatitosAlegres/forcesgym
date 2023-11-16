<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evaluation;
use App\Models\Candidate;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recruiters = [
            'Juan Perez García',
            'Marco Cabrera Sánchez',
            'Pedro González López',
            'Luis Hernández Martínez',
        ];

        for ($i = 1; $i <= Candidate::count(); $i++) {
            Evaluation::create([
                'code' => 'E-000' . $i, // Puedes personalizar el formato del código
                'recruiter' => $recruiters[array_rand($recruiters)],
                'candidate_id' => rand(1, 7),
                'state' => rand(0, 1),
            ]);
        }
    }
}
