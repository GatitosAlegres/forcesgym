<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoDeMembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoDeMembresias = [
            [
                'Mensual'=> 120,
            ],
            [
                'Anual'=>1400,
            ],
            [
                'Casual'=>7,
            ],
        ];

        foreach ($tipoDeMembresias as $tipoDeMembresia) {
            DB::table('tipo_de_membresias')->insert([
                'nombre_tipo_membresia' => array_key_first($tipoDeMembresia),
                'precio' => array_values($tipoDeMembresia)[0],
            ]);
        }
    }
}
