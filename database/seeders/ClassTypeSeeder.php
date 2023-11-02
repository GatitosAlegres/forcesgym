<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassType;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoClases = [
            'Entrenamiento Personalizado Uno a Uno' => 'Entrenamiento individualizado y adaptado a tus necesidades.',
            'Entrenamiento Personalizado de Fuerza' => 'Entrenamiento enfocado en desarrollar la fuerza muscular.',
            'Sesión de Entrenamiento Individualizada' => 'Sesión de entrenamiento diseñada exclusivamente para ti.',
            'Clase Privada de Yoga' => 'Clase de yoga individual para mejorar bienestar físico y mental.',
            'Entrenamiento de Resistencia Personalizado' => 'Entrenamiento para mejorar resistencia física y cardiovascular.',
            'Entrenamiento de Alta Intensidad Individual' => 'Entrenamiento de alta intensidad adaptado a tus capacidades.',
            'Entrenamiento Funcional Personalizado' => 'Entrenamiento basado en movimientos naturales del cuerpo.',
            'Sesión de Entrenamiento de Boxeo Individual' => 'Sesión de boxeo adaptada a tus habilidades y experiencia.',
            'Clase Privada de Pilates' => 'Clase de Pilates individual para mejorar la fuerza y flexibilidad.',
            'Entrenamiento de Flexibilidad y Movilidad Personalizado' => 'Entrenamiento para mejorar flexibilidad y movilidad.'
        ];

        foreach ($tipoClases as $nombre => $descripcion) {
            ClassType::create([
                'nombre_tipo_clase' => $nombre,
                'descripcion_tipo_clase' => $descripcion
            ]);
        }
    }
}
