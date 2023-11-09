<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define el número de registros que deseas crear
         $numberOfCustomers = 16;

         for ($i = 0; $i < $numberOfCustomers; $i++) {
             Customer::create([
                 'nombre' => 'Cliente ' . ($i + 1),
                 'dni' => Str::random(8), // Genera un DNI aleatorio
                 'email' => 'cliente' . ($i + 1) . '@example.com',
                 'telefono' => Str::random(9), // Genera un número de teléfono aleatorio
                 'direccion' => 'Dirección de Cliente ' . ($i + 1),
             ]);
            }
    }
}
