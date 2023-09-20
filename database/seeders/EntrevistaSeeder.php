<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrevistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $e1 = \App\Models\Entrevista::create([           
            'vacante_id' => 1,
            'curriculum_id' => 1,
            'link' => 'Entrevista presencial',
            'fecha' => '2023-07-25',
            'comentario' => 'Primera entrevista',

        ]);

        $e2 = \App\Models\Entrevista::create([
            'vacante_id' => 2,
            'curriculum_id' => 2,          
            'fecha' => '2023-07-26',
            'link' => 'meet.google.com/entrevista2',
            'comentario' => 'Segunda entrevista, asistir puntualmente',
        ]);
    }
}
