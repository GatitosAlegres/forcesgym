<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Listas de nombres ficticios
        $nombresMasculinos = ['Juan José', 'Carlos Alberto', 'Luis Antonio'];
        $nombresFemeninos = ['Laura Valentina', 'María Fernanda', 'Ana Sofía'];
        $apellidos = ['Pérez García', 'Martínez Gómez', 'Vargas Ruiz', 'Cerna Alvarado', 'Salcedo Mendoza', 'Montoya Terrones'];

        $generos = [1, 2];
        $dias = [1, 2, 3, 4];
        $jornadas = [1, 2];

        for ($i = 1; $i <= 6; $i++) {
            $nombreAleatorio = '';
            $generoAleatorio = 0;

            if (rand(0, 1) === 0) { 
                $nombreAleatorio = $nombresMasculinos[array_rand($nombresMasculinos)];
                $generoAleatorio = 1; 
            } else {
                $nombreAleatorio = $nombresFemeninos[array_rand($nombresFemeninos)];
                $generoAleatorio = 2; 
            }

            $dayAleatorio = $dias[array_rand($dias)];
            $journeyAleatorio = ($dayAleatorio === 1 || $dayAleatorio === 2) ? 1 : 2; 
            $apellidoAleatorio = $apellidos[array_rand($apellidos)];

            Candidate::create([
                'vacancy_id' => rand(1, 4),
                'gender_id' => $generoAleatorio,
                'journey_id' => $journeyAleatorio, 
                'day_id' => $dayAleatorio, 
                'contract_duration_id' => rand(1,5), 
                'dni' => strval(rand(10000000, 99999999)),
                'firstname' => $nombreAleatorio,
                'lastname' => $apellidoAleatorio,
                'email' => strtolower(str_replace(' ', '_', $nombreAleatorio)) . $i . '@ejemplo.com',
                'phone' => strval(rand(900000000, 999999999)),
                'address' => 'Av. Jiron Prado - Calle ' . $i,
                'curriculum_url' => 'curriculum' . ($i + 10) . '.pdf',
            ]);
        }
    }
}
