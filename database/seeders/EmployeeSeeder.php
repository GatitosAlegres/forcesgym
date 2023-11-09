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

        $nombresMasculinos = ['Alejandro', 'Juan Pablo', 'Andrés Felipe', 'David Gonzalo', 'Joaquín Lucas','Luis Miguel', 'Javier Ignacio', 'Daniel Eduardo', 'Carlos Enrique', 'Martín Sebastián', 'Jesus', 'Lautaro Domingo'];
        $nombresFemeninos = ['Camila Fernanda', 'Valeria Amanda', 'Antonia Isabella', 'Renata Francisca','Patricia Estefanía', 'Karla Alejandra', 'Ximena','Natalia Antonia', 'Sofía Valentina'];
        $apellidos = ['Torres González', 'Pérez Sánchez', 'Díaz López', 'Ramírez Pérez', 'Cabrera Sánchez',
        'Soto Ramírez', 'Cruz Martínez', 'Ortega Pérez', 'Mendoza Sánchez', 'Silva Martínez',
        'Núñez López','López Martínez','González Pérez','Fernández Sánchez', 'Gutierrez Nuñez','Torres López', 'Cabanilla Arias' ,'Pérez González','Martínez Rodríguez','Sánchez Fernández','García Torres','Soto Martínez'];

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
            $feeAleatorio = rand(0, 1);
            $payrollAleatorio = ($feeAleatorio === 1) ? 0 : rand(0, 1);

            if ($feeAleatorio === 0 && $payrollAleatorio === 0) {
                $randomField = rand(0, 1);
                if ($randomField === 0) {
                    $feeAleatorio = 1;
                } else {
                    $payrollAleatorio = 1;
                }
            }

            Employee::create([
                'vacancy_id' => rand(2, 3),
                'gender_id' => $generoAleatorio,
                'journey_id' => $journeyAleatorio,
                'day_id' => $dayAleatorio,
                'contract_duration_id' => rand(1,5),
                'dni' => strval(rand(10000000, 99999999)),
                'fullname' => $nombreAleatorio.' '.$apellidoAleatorio,
                'email' => strtolower(str_replace(' ', '_', $nombreAleatorio)) . $i . '@ejemplo.com',
                'phone' => strval(rand(900000000, 999999999)),
                'address' => 'Urb. Monzerrate - Calle Taiwan N°' . $i,
                'fee' => $feeAleatorio,
                'payroll' => $payrollAleatorio,
            ]);
        }

        Employee::create([
            'vacancy_id' => 2,
            'gender_id' => 1,
            'journey_id' => 1,
            'day_id' => 1,
            'contract_duration_id' => 3,
            'dni' => '12345678',
            'fullname' => 'Kevin Alexander Mostacero Cerna',
            'email' => 'mostacero@gmail.com',
            'phone' => '951753846',
            'address' => 'Av. Las manzanas gordas #432',
            'fee' => 0,
            'payroll' => 1,
        ]);

        Employee::create([
            'vacancy_id' => 2, // Cambiar el número de la vacante si es diferente
            'gender_id' => 2,  // Cambiar el ID del género si es diferente
            'journey_id' => 2, // Cambiar el ID del turno si es diferente
            'day_id' => 3,     // Cambiar el ID del día si es diferente
            'contract_duration_id' => 1, // Cambiar el ID de la duración del contrato si es diferente
            'dni' => '87654321',  // Cambiar el número de DNI si es diferente
            'fullname' => 'María López Pérez', // Cambiar el nombre y apellidos
            'email' => 'maria@example.com', // Cambiar el correo electrónico
            'phone' => '987654321',  // Cambiar el número de teléfono
            'address' => 'Calle Principal #123', // Cambiar la dirección
            'fee' => 0,   // Cambiar la tarifa si es diferente
            'payroll' => 1, // Cambiar el valor de nómina si es diferente
        ]);

        Employee::create([
            'vacancy_id' => 2,
            'gender_id' => 1,
            'journey_id' => 2,
            'day_id' => 2,
            'contract_duration_id' => 2,
            'dni' => '98765432',
            'fullname' => 'Ana Rodríguez García',
            'email' => 'ana@example.com',
            'phone' => '987123456',
            'address' => 'Calle de los Pájaros #567',
            'fee' => 0,
            'payroll' => 1,
        ]);

        Employee::create([
            'vacancy_id' => 2,
            'gender_id' => 2,
            'journey_id' => 1,
            'day_id' => 1,
            'contract_duration_id' => 3,
            'dni' => '11223344',
            'fullname' => 'Carlos Ramírez Sánchez',
            'email' => 'carlos@example.com',
            'phone' => '955566677',
            'address' => 'Avenida de las Flores #789',
            'fee' => 0,
            'payroll' => 1,
        ]);


        Employee::create([
            'vacancy_id' => 2,
            'gender_id' => 2,
            'journey_id' => 1,
            'day_id' => 1,
            'contract_duration_id' => 3,
            'dni' => '78451236',
            'fullname' => 'Karen Maria Carrera Peraldo',
            'email' => 'carrera@gmail.com',
            'phone' => '913782645',
            'address' => 'Av. El cabezon #123',
            'fee' => 0,
            'payroll' => 1,
        ]);

        Employee::create([
            'vacancy_id' => 4,
            'gender_id' => 2,
            'journey_id' => 1,
            'day_id' => 1,
            'contract_duration_id' => 3,
            'dni' => '79316482',
            'fullname' => 'Andrea Carolina Rodríguez García',
            'email' => 'andrea_rgracia@gmail.com',
            'phone' => '965199105',
            'address' => 'Av. Los Florales - Calle  #112',
            'fee' => 0,
            'payroll' => 1,
        ]);

        Employee::create([
            'vacancy_id' => 1,
            'gender_id' => 2,
            'journey_id' => 2,
            'day_id' => 3,
            'contract_duration_id' => 4,
            'dni' => '14151617',
            'fullname' => 'Luz Mariana Ruiz Camacho',
            'email' => 'ruizmariana12@gmail.com',
            'phone' => '965199105',
            'address' => 'Av. Los Florales - Calle  #467',
            'fee' => 1,
            'payroll' => 0,
        ]);

        Employee::create([
            'vacancy_id' => 1,
            'gender_id' => 2,
            'journey_id' => 2,
            'day_id' => 4,
            'contract_duration_id' => 2,
            'dni' => '71234567',
            'fullname' => 'Mario Miguel Silva Torrealva',
            'email' => 'torrealva_marioa@gmail.com',
            'phone' => '987654321',
            'address' => 'Av. Los Florales - Calle  #63',
            'fee' => 1,
            'payroll' => 0,
        ]);

    }
}
