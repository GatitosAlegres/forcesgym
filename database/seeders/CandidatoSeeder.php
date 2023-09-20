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

                // Assign admin role to admin user
        $c1->assignRole('candidato');

        $c2 = \App\Models\User::create([
            'name' => 'Juan Alberto Montoya Terrones',
            'email' => 'jmontoya1@gmail.com',
            'password' => bcrypt('12345'),
        ]);

                // Assign admin role to admin user
        $c2->assignRole('candidato');

        $c3 = \App\Models\User::create([
            'name' => 'Felipe Antonio Vargas Ruiz',
            'email' => 'fvargars@gmail.com',
            'password' => bcrypt('12345'),
        ]);

                // Assign admin role to admin user
        $c3->assignRole('candidato');

        $c4 = \App\Models\User::create([
            'name' => 'Antonella Brigitte Vargas Mendoza',
            'email' => 'anto_vargas122@gmail.com',
            'password' => bcrypt('12345'),
        ]);

                // Assign admin role to admin user
        $c4->assignRole('candidato');

        $c5 = \App\Models\User::create([
            'name' => 'Luisa Fernanda Garcia Romero',
            'email' => 'lu124@gmail.com',
            'password' => bcrypt('12345'),
        ]);

                // Assign admin role to admin user
        $c5->assignRole('entrenador');

        $c6 = \App\Models\User::create([
            'name' => 'Jhon Segundo Cerna Alvarado',
            'email' => 'jhon@gmail.com',
            'password' => bcrypt('12345'),
        ]);

                // Assign admin role to admin user
        $c6->assignRole('entrenador');

        $c7 = \App\Models\User::create([
            'name' => 'Laura Martínez Gómez',
            'email' => 'laura123@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c7->assignRole('cliente');

        $c8 = \App\Models\User::create([
            'name' => 'Carlos Sánchez Rodríguez',
            'email' => 'carlos1987@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c8->assignRole('cliente');

        $c9 = \App\Models\User::create([
            'name' => 'María Torres López',
            'email' => 'mariafit@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c9->assignRole('cliente');

        $c10 = \App\Models\User::create([
            'name' => 'Pedro Ramírez Pérez',
            'email' => 'pedrofitness@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c10->assignRole('cliente');

        $c11 = \App\Models\User::create([
            'name' => 'Ana Jiménez Mendoza',
            'email' => 'ana_gym@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c11->assignRole('cliente');

        $c12 = \App\Models\User::create([
            'name' => 'Roberto Gutiérrez Vega',
            'email' => 'robertfit@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c12->assignRole('cliente');

        $c13 = \App\Models\User::create([
            'name' => 'Isabel Herrera Ríos',
            'email' => 'isabel123@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c13->assignRole('cliente');

        $c14 = \App\Models\User::create([
            'name' => 'Alejandro Mendoza Ortega',
            'email' => 'alejandro_gym@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c14->assignRole('cliente');

        $c15 = \App\Models\User::create([
            'name' => 'Diana Paredes Castillo',
            'email' => 'diana_fitness@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c15->assignRole('cliente');

        $c16 = \App\Models\User::create([
            'name' => 'Ricardo Silva Góngora',
            'email' => 'ricardo_fit@example.com',
            'password' => bcrypt('12345'),
        ]);

        // Assign client role to user
        $c16->assignRole('cliente');

        $c17 = \App\Models\User::create([
            'name' => 'Gabriela Rojas Pérez',
            'email' => 'gabriela123@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c17->assignRole('entrenador');

        // Ejemplo 2
        $c18 = \App\Models\User::create([
            'name' => 'Carlos Soto Herrera',
            'email' => 'carlos_fitness@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c18->assignRole('entrenador');

        // Ejemplo 3
        $c19 = \App\Models\User::create([
            'name' => 'María Torres Gómez',
            'email' => 'mtorres_fitness@hotmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c19->assignRole('entrenador');

        // Ejemplo 4
        $c20 = \App\Models\User::create([
            'name' => 'Roberto Méndez Cruz',
            'email' => 'roberto_fit@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c20->assignRole('entrenador');

        // Ejemplo 5
        $c21 = \App\Models\User::create([
            'name' => 'Ana Martínez Sánchez',
            'email' => 'ana_fitness@yahoo.com',
            'password' => bcrypt('12345'),
        ]);
        $c21->assignRole('entrenador');

        // Ejemplo 6
        $c22 = \App\Models\User::create([
            'name' => 'Miguel Gómez Velasco',
            'email' => 'miguel_fit@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c22->assignRole('entrenador');

        // Ejemplo 7
        $c23 = \App\Models\User::create([
            'name' => 'Laura Cordero Ríos',
            'email' => 'laura1234@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c23->assignRole('entrenador');

        // Ejemplo 8
        $c24 = \App\Models\User::create([
            'name' => 'Alejandro Ramírez Paredes',
            'email' => 'ale_fitness@hotmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c24->assignRole('entrenador');

        $c25 = \App\Models\User::create([
            'name' => 'Diana Paredes Castillo',
            'email' => 'diana234@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        $c25->assignRole('gerente-de-marketing');
    }
}
