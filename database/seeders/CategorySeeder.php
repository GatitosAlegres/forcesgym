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
            "Cardio", "Fuerza", "Yoga", "Pilates", "Aeróbicos", "Recuperación", "Accesorios", "Boxeo", 
            "Pliometría", "Equilibrio", "Suplementos Nutricionales", "Polos", "Casacas","Leggings", "Zapatillas", "Nutrición", "Electrónica", 
            "Hidratación", "Resistencia", "Libros", "Cuadernos", "Toma-Todos"
        ];

        foreach ($categoryNames as $key => $name) {
            \App\Models\Category::create([
                'name' => $name
            ]);
        }
    }
}
