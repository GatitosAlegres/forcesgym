<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Create filament admin user from .env
        $c1 = \App\Models\User::create([
            'name' => 'Roberto Carlos Hermoso',
            'email' => 'rcarlos123@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $c2 = \App\Models\User::create([
            'name' => 'Juan Alberto Montoya Terrones',
            'email' => 'jmontoya1@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $c3 = \App\Models\User::create([
            'name' => 'Felipe Antonio Vargas Ruiz',
            'email' => 'fvargars@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $c4 = \App\Models\User::create([
            'name' => 'Antonella Brigitte Vargas Mendoza',
            'email' => 'anto_vargas122@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $c5 = \App\Models\User::create([
            'name' => 'Luisa Fernanda Garcia Romero',
            'email' => 'lu124@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $c6 = \App\Models\User::create([
            'name' => 'Jhon Segundo Cerna Alvarado',
            'email' => 'jhon@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        $c7 = \App\Models\User::create([
            'name' => 'Laura Martínez Gómez',
            'email' => 'laura123@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c8 = \App\Models\User::create([
            'name' => 'Carlos Sánchez Rodríguez',
            'email' => 'carlos1987@example.com',
            'password' => bcrypt('12345'),
        ]);

        $c9 = \App\Models\User::create([
            'name' => 'María Torres López',
            'email' => 'mariafit@example.com',
            'password' => bcrypt('12345'),
        ]);

        $c10 = \App\Models\User::create([
            'name' => 'Pedro Ramírez Pérez',
            'email' => 'pedrofitness@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c11 = \App\Models\User::create([
            'name' => 'Ana Jiménez Mendoza',
            'email' => 'ana_gym@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c12 = \App\Models\User::create([
            'name' => 'Roberto Gutiérrez Vega',
            'email' => 'robertfit@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c13 = \App\Models\User::create([
            'name' => 'Isabel Herrera Ríos',
            'email' => 'isabel123@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c14 = \App\Models\User::create([
            'name' => 'Alejandro Mendoza Ortega',
            'email' => 'alejandro_gym@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c15 = \App\Models\User::create([
            'name' => 'Diana Paredes Castillo',
            'email' => 'diana_fitness@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c16 = \App\Models\User::create([
            'name' => 'Ricardo Silva Góngora',
            'email' => 'ricardo_fit@example.com',
            'password' => bcrypt('12345'),
        ]);


        $c17 = \App\Models\User::create([
            'name' => 'Gabriela Rojas Pérez',
            'email' => 'gabriela123@gmail.com',
            'password' => bcrypt('12345'),
        ]);


        // Ejemplo 2
        $c18 = \App\Models\User::create([
            'name' => 'Carlos Soto Herrera',
            'email' => 'carlos_fitness@gmail.com',
            'password' => bcrypt('12345'),
        ]);


        // Ejemplo 3
        $c19 = \App\Models\User::create([
            'name' => 'María Torres Gómez',
            'email' => 'mtorres_fitness@hotmail.com',
            'password' => bcrypt('12345'),
        ]);


        // Ejemplo 4
        $c20 = \App\Models\User::create([
            'name' => 'Roberto Méndez Cruz',
            'email' => 'roberto_fit@gmail.com',
            'password' => bcrypt('12345'),
        ]);


        // Ejemplo 5
        $c21 = \App\Models\User::create([
            'name' => 'Ana Martínez Sánchez',
            'email' => 'ana_fitness@yahoo.com',
            'password' => bcrypt('12345'),
        ]);


        // Ejemplo 6
        $c22 = \App\Models\User::create([
            'name' => 'Miguel Gómez Velasco',
            'email' => 'miguel_fit@gmail.com',
            'password' => bcrypt('12345'),
        ]);


        // Ejemplo 7
        $c23 = \App\Models\User::create([
            'name' => 'Laura Cordero Ríos',
            'email' => 'laura1234@gmail.com',
            'password' => bcrypt('12345'),
        ]);


        // Ejemplo 8
        $c24 = \App\Models\User::create([
            'name' => 'Alejandro Ramírez Paredes',
            'email' => 'ale_fitness@hotmail.com',
            'password' => bcrypt('12345'),
        ]);

        $c25 = \App\Models\User::create([
            'name' => 'Diana Paredes Castillo',
            'email' => 'diana234@gmail.com',
            'password' => bcrypt('12345'),
        ]);

    }
}
