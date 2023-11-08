<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\RemisionGuide;
use App\Models\Supplier;
use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => 'CP' . $this->faker->unique()->numerify('##########') . now()->year,
            'issue_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'currency' => $this->faker->randomElement(['PEN', 'USD']),
            'status' => $this->faker->randomElement(['nuevo', 'procesando', 'entregado', 'cancelado']),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'notes' => $this->faker->text(200),
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
            'remision_guide_id' => RemisionGuide::inRandomOrder()->first()->id,
            'invoice_id' => Invoice::inRandomOrder()->first()->id,
            'warranty_id' => Warranty::inRandomOrder()->first()->id
        ];
    }
}
