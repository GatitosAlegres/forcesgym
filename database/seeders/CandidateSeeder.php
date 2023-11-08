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

        $nombresMasculinos = ['Luis Miguel', 'Jose Alfredo','Javier Ignacio', 'Daniel Eduardo', 'Carlos Enrique', 'Martín Sebastián'];
        $nombresFemeninos = ['Xioamara Gabriela','Patricia Estefanía', 'Karla Alejandra', 'Ximena','Natalia Antonia', 'Sofía Valentina'];
       
        $apellidos = [
            'Rodríguez López', 'Fernández Pérez', 'Gutiérrez Sánchez', 'Hernández Martínez',
            'Torres González', 'Pérez Sánchez', 'Díaz López', 'Ramírez Pérez', 'Cabrera Sánchez',
            'Soto Ramírez', 'Cruz Martínez', 'Ortega Pérez', 'Mendoza Sánchez', 'Silva Martínez',
            'Núñez López', 'Chávez Pérez', 'Molina Sánchez', 'Gómez Martínez', 'Ramos López',
            'Sanchez Hernández', 'Romero Pérez', 'Vargas Martínez', 'Dominguez López',
        ];

        $generos = [1, 2];
        $dias = [1, 2, 3, 4];
        $jornadas = [1, 2];

        for ($i = 1; $i <= 7; $i++) {
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
                'fullname' => $nombreAleatorio.' '.$apellidoAleatorio,
                'email' => strtolower(str_replace(' ', '_', $nombreAleatorio)) . $i . '@ejemplo.com',
                'phone' => strval(rand(900000000, 999999999)),
                'address' => 'Urb. Monzerrate - Calle Australia # ' . $i,
                'curriculum_url' => 'curriculum'.$i.'.pdf',
            ]);
        }

    }
}
