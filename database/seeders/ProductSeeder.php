<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
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

        $categoryIds = Category::whereIn('name', $categoryNames)->pluck('id')->toArray();

        $products = [
            [
                'name' => 'Cinta de correr',
                'description' => 'Cinta de correr profesional con motor potente y diferentes programas de entrenamiento.',
                'price' => 1499.99,
                'stock' => 10,
                'image' => 'treadmill.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ],
            [
                'name' => 'Máquina de pesas',
                'description' => 'Máquina de pesas multifuncional para entrenamiento de fuerza y resistencia.',
                'price' => 1999.99,
                'stock' => 5,
                'image' => 'weight_machine.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ],
            [
                'name' => 'Bicicleta estática',
                'description' => 'Bicicleta estática con diferentes programas de entrenamiento y medición de frecuencia cardíaca.',
                'price' => 799.99,
                'stock' => 15,
                'image' => 'exercise_bike.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ],
            [
                'name' => 'Banco de pesas',
                'description' => 'Banco de pesas para entrenamiento de fuerza y resistencia.',
                'price' => 299.99,
                'stock' => 8,
                'image' => 'weight_bench.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ],
            [
                'name' => 'Mancuernas',
                'description' => 'Mancuernas de diferentes pesos para entrenamiento de fuerza y resistencia.',
                'price' => 99.99,
                'stock' => 50,
                'image' => 'dumbbells.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ],
            [
                'name' => 'Bicicleta de montaña',
                'description' => 'Bicicleta de montaña con suspensión delantera y frenos de disco.',
                'price' => 599.99,
                'stock' => 20,
                'image' => 'mountain_bike.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ],
            [
                'name' => 'Bicicleta de carretera',
                'description' => 'Bicicleta de carretera con cuadro de carbono y frenos de disco.',
                'price' => 999.99,
                'stock' => 10,
                'image' => 'road_bike.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ],
            [
                'name' => 'Bicicleta eléctrica',
                'description' => 'Bicicleta eléctrica con motor de 250W y batería de 36V.',
                'price' => 1299.99,
                'stock' => 5,
                'image' => 'electric_bike.jpg',
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
