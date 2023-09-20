<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Nike',
                'email' => 'nike@example.com',
                'address' => '123 Street, City, Country',
                'phone' => '123456789',
                'type' => 'juridico',
            ],
            [
                'name' => 'Adidas',
                'email' => 'adidas@example.com',
                'address' => '456 Avenue, City, Country',
                'phone' => '987654321',
                'type' => 'natural',
            ],
            [
                'name' => 'Reebok',
                'email' => 'reebok@example.com',
                'address' => '789 Road, City, Country',
                'phone' => '555555555',
                'type' => 'juridico',
            ],
            [
                'name' => 'Under Armour',
                'email' => 'underarmour@example.com',
                'address' => '321 Lane, City, Country',
                'phone' => '777777777',
                'type' => 'natural',
            ],
            [
                'name' => 'Puma',
                'email' => 'puma@example.com',
                'address' => '654 Boulevard, City, Country',
                'phone' => '999999999',
                'type' => 'juridico',
            ],
            [
                'name' => 'Life Fitness',
                'email' => 'lifefitness@example.com',
                'address' => '987 Park, City, Country',
                'phone' => '555888999',
                'type' => 'juridico',
            ],
            [
                'name' => 'Cybex',
                'email' => 'cybex@example.com',
                'address' => '543 Gym Street, City, Country',
                'phone' => '777888666',
                'type' => 'natural',
            ],
            [
                'name' => 'Precor',
                'email' => 'precor@example.com',
                'address' => '246 Fitness Avenue, City, Country',
                'phone' => '111222333',
                'type' => 'juridico',
            ],
            [
                'name' => 'MuscleTech',
                'email' => 'muscletech@example.com',
                'address' => '789 Supplement Lane, City, Country',
                'phone' => '444555666',
                'type' => 'natural',
            ],
            [
                'name' => 'Optimum Nutrition',
                'email' => 'optimumnutrition@example.com',
                'address' => '456 Protein Road, City, Country',
                'phone' => '888777555',
                'type' => 'juridico',
            ],
        ];

        foreach ($suppliers as $supplier) {
            \App\Models\Supplier::create($supplier);
        }
    }
}
