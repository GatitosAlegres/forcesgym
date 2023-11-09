<?php

namespace Database\Seeders;

use App\Models\Purchase;
use App\Models\PurchaseDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Purchase::factory([
            'status' => 'procesando'
        ])
            ->count(5)
            ->has(PurchaseDetail::factory()->count(3), 'detalles')
            ->create();

        Purchase::factory([
            'status' => 'entregado'
        ])
            ->count(50)
            ->has(PurchaseDetail::factory()->count(10), 'detalles')
            ->create();
    }
}
