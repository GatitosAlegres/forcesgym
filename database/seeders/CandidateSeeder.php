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

        $nombresMasculinos = ['Luis Miguel', 'Jose Alfredo', 'Javier Ignacio', 'Daniel Eduardo', 'Carlos Enrique', 'Martín Sebastián', 'Alejandro', 'Juan Carlos', 'Ricardo', 'Fernando', 'Héctor', 'Mario', 'Andrés', 'Pedro', 'Gabriel', 'Miguel Ángel', 'Felipe', 'Raúl', 'Sergio', 'Francisco', 'Gustavo', 'Ignacio', 'Rafael', 'Emilio', 'Eduardo', 'Jorge', 'Antonio', 'Rodrigo'];

        $nombresFemeninos = ['Xioamara Gabriela', 'Patricia Estefanía', 'Karla Alejandra', 'Ximena', 'Natalia Antonia', 'Sofía Valentina', 'Isabella', 'Fabiola', 'Laura', 'María José', 'Cristina', 'Valeria', 'Daniela', 'Mariana', 'Victoria', 'Lucía', 'Gabriela', 'Alejandra', 'Ana Sofía', 'Carolina', 'Renata', 'Paula', 'Adriana', 'Raquel', 'Beatriz', 'Elena', 'Esther', 'Verónica'];
        
       
        $apellidos = [
            'Rodríguez López', 'Fernández Pérez', 'Gutiérrez Sánchez', 'Hernández Martínez',
            'Torres González', 'Pérez Sánchez', 'Díaz López', 'Ramírez Pérez', 'Cabrera Sánchez',
            'Soto Ramírez', 'Cruz Martínez', 'Ortega Pérez', 'Mendoza Sánchez', 'Silva Martínez',
            'Núñez López', 'Chávez Pérez', 'Molina Sánchez', 'Gómez Martínez', 'Ramos López',
            'Sanchez Hernández', 'Romero Pérez', 'Vargas Martínez', 'Dominguez López',
            'Guerrero Ramírez', 'Castillo Soto', 'Acosta Díaz', 'Moreno Silva', 'Cortez Núñez',
            'Luna García', 'Ríos Rodríguez', 'Salgado González', 'Pacheco Mendoza', 'Cruz Torres',
            'Jiménez Vargas', 'Navarro Díaz', 'Salinas Sánchez', 'Cervantes Pérez', 'Villa Martínez',
            'Miranda López', 'Castañeda Chávez', 'Peralta Molina', 'Serrano Gómez', 'Guadarrama Ramos',
            'Santos Mendoza', 'Bautista Silva', 'Cisneros Núñez', 'Trujillo Pérez', 'Hidalgo Cruz',
        ];
        

        $generos = [1, 2];
        $dias = [1, 2, 3, 4];
        $jornadas = [1, 2];

        for ($i = 1; $i <= 25; $i++) {
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
