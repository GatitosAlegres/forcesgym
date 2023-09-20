<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoPago;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pagos = ['Quincenal', 'Mensual', 'Semanal'];

        foreach ($pagos as $pago) {
            TipoPago::create([
                'descripcion' => $pago,
            ]);
        }
    }
}