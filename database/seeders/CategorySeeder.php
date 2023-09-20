<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryNames = [
            'Aparatos de cardio',
            'Equipos de fuerza',
            'Accesorios',
            'Ropa deportiva',
            'Calzado deportivo',
            'Suplementos nutricionales',
            'Electrónica deportiva',
            'Libros y material educativo'
        ];

        $categoryDescripcions = [
            'Son diseñados para realizar ejercicios cardiovasculares',
            'Se utilizan para trabajar y fortalecer los diferentes grupos musculares del cuerpo',
            'Elementos utilizados para complementar los entrenamientos',
            'Incluye prendas diseñadas específicamente para el entrenamiento',
            'Se incluyen zapatillas especializadas para diferentes tipos de actividades físicas, como entrenamiento general, correr o levantamiento de pesas',
            'Abarca productos en forma de polvos, cápsulas o líquidos que se utilizan para complementar la nutrición y mejorar el rendimiento deportivo',
            'Dispositivos electrónicos utilizados en el contexto del ejercicio físico',
            'Recursos educativos relacionados con el entrenamiento, la nutrición y la salud en general'
        ];

        foreach ($categoryNames as $key => $name) {
            \App\Models\Category::create([
                'name' => $name,
                'description' => $categoryDescripcions[$key]
            ]);
        }
    }
}
