<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'invoice_number' => 'FC-' . $this->faker->unique()->numberBetween(1000, 9000) . '-' . now()->year,
            'due_date' => now()->addDays(30),
            'total_amount' => $this->faker->randomFloat(2, 100, 1000),
            'paid' => false,
            'artifact' => $this->getArtifact('invoice.jpg'),
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
        ];
    }

    private function getArtifact($name)
    {
        return 'invoices/' . $name;
    }
}
