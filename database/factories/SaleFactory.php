<?php

namespace Database\Factories;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                'document_type' => $this->faker->randomElement(['Boleta', 'Factura']),
                'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
                'cliente_id' => Customer::inRandomOrder()->first()->id,
                'amount' => $this->faker->randomFloat(2, 100, 1000), // Ajusta los valores mínimo y máximo según tus necesidades.

        ];
    }
}
