<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MembershipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoDeMembership = [
            [
                'Mensual' => 120,
            ],
            [
                'Anual' => 1400,
            ],
            [
                'Casual' => 7,
            ],
        ];

        foreach ($tipoDeMembership as $tipoDeMembresia) {
            DB::table('membership_types')->insert([
                'nombre_tipo_membresia' => array_key_first($tipoDeMembresia),
                'precio' => array_values($tipoDeMembresia)[0],
            ]);
        }
    }
}
