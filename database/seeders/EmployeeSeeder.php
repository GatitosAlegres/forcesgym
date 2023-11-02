<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombresMasculinos = ['Luis Miguel', 'Javier Ignacio', 'Daniel Eduardo', 'Carlos Enrique', 'Martín Sebastián'];
        $nombresFemeninos = ['Andrea Carolina', 'Patricia Estefanía', 'Karla Alejandra', 'Natalia Antonia', 'Sofía Valentina'];
        $apellidos = ['Rodríguez García','López Martínez','González Pérez','Fernández Sánchez
        ','Torres López', 'Pérez González','Martínez Rodríguez','Sánchez Fernández','García Torres','Soto Martínez'];

        $generos = [1, 2];
        $dias = [1, 2, 3, 4];
        $jornadas = [1, 2];

        for ($i = 1; $i <= 10; $i++) {
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

            Employee::create([
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
                'address' => 'Av. Los Tulipanes - Calle  ' . $i,
                'fee' => 0,
                'payroll' => 0,
            ]);
        }
    }
}
