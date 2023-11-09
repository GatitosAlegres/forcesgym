<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Importa el generador Faker
use Carbon\Carbon;
use App\Models\Membership;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $descriptions = [
            'Renovación de membresía anual',
            'Renovación de membresía mensual',
            'Renovación de membresía trimestral',
        ];

        for ($i = 0; $i < 200; $i++) {
            $tipo_membresia_id = rand(1, 3);
            $precio = ($tipo_membresia_id === 1) ? 7 : (($tipo_membresia_id === 2) ? 120 : 1400);

            Membership::create([
                'nombreCliente' => $faker->unique()->firstName() . ' ' . $faker->unique()->lastName(),
                'tipo_membresia_id' => $tipo_membresia_id,
                'descripcion' => $descriptions[array_rand($descriptions)],
                'precio' => $precio,
                'activo' => true,
                'fecha_inicio' => Carbon::now()->subDays(rand(0, 30)),
                'fecha_fin' => Carbon::now()->addDays(rand(1, 30)),
            ]);
        }
    }
}
