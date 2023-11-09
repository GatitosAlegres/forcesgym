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
                'name' => 'Fortexgym',
                'email' => 'ventas@fortexgym.com',
                'address' => 'Buena Ventura Rey 309 Ciudad de Dios - SJM, Lima, Perú',
                'phone' => '967276170',
                'website' => 'https://www.fortexgym.com',
                'type' => 'juridico',
            ],
            [
                'name' => 'Profit',
                'email' => 'profitperu21@gmail.com',
                'address' => 'Av. Primavera 1310, Of. 203, Surco. Lima',
                'phone' => '989788777',
                'website' => 'https://profitperu.odoo.com',
                'type' => 'juridico',
            ],
            [
                'name' => 'Servigym Peru',
                'email' => 'servigymperu@gmail.com',
                'address' => 'Surquillo, Lima, Perú',
                'phone' => '999960037',
                'website' => 'https://www.servigymperu.com',
                'type' => 'juridico',
            ],
            [
                'name' => 'Movement',
                'email' => 'informes@movementlima.com',
                'address' => 'Lima, Perú',
                'phone' => '013627759',
                'website' => 'https://movementlima.com',
                'type' => 'juridico',
            ],
            [
                'name' => 'Fitness Extreme Peru',
                'email' => 'fitness.xtreme.peru@gmail.com',
                'address' => 'Av. Alfonso Ugarte 203, cercado de Lima',
                'phone' => '941363975',
                'website' => 'https://fitnessextremeperu.com.pe',
                'type' => 'juridico',
            ],
            [// 6
                'name' => 'Alphafit',
                'email' => 'contacto@alphafit.pe',
                'address' => 'Calle Alcanfores 290 Miraflores',
                'phone' => '946002785',
                'website' => 'https://www.alphafit.pe',
                'type' => 'juridico',
            ],
            [
                'name' => 'Corporación Lindley',
                'email' => 'acliente@lindley.pe',
                'address' => 'Lima, Perú',
                'phone' => '080014000',
                'website' => 'arcacontinentallindley.pe',
                'type' => 'juridico',
            ],
            [ // 8
                'name' => 'Nutripoint',
                'email' => 'atencionalcliente@nutripoint.com.pe',
                'address' => 'Jirón Salaverry 655, Magdalena',
                'phone' => '952952061',
                'website' => 'https://nutripoint.com.pe',
                'type' => 'juridico',
            ],
            [ // 9
                'name' => 'Nutriforma',
                'email' => 'contacto@nutriforma.pe',
                'address' => 'Av. Larco N° 680 Int 202, al costado de Smartfit, Miraflores',
                'phone' => '956104920',
                'website' => 'https://nutriforma.pe',
                'type' => 'juridico',
            ],
        ];

        foreach ($suppliers as $supplier) {
            \App\Models\Supplier::create($supplier);
        }
    }
}
