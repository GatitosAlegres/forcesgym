<?php

namespace Database\Factories;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleDetail>
 */
class SaleDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'sale_id' => Sale::inRandomOrder()->first()->id,
        'product_id' => Product::inRandomOrder()->first()->id,
        'quantity' => $this->faker->numberBetween(1, 10),
        'price_unitary' => $this->faker->randomFloat(2, 100, 1000),
        'sub_amount' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
