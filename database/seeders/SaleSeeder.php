<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::factory([

        ])
        ->count(100) // Crea 50 registros de venta
        ->has(SaleDetail::factory()->count(5), 'saleDetails') // Asocia detalles de venta
        ->create();

     }

}
