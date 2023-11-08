<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warranty>
 */
class WarrantyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warranty_code' => 'GRT-' . $this->faker->unique()->numberBetween(1000, 9000) . '-' . now()->year,
            'initial_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'expiration_date' => $this->faker->dateTimeBetween('now', '+1 years'),
            'artifact' => $this->getArtifact('warranty.png')
        ];
    }

    private function getArtifact($name)
    {
        return 'warranties/' . $name;
    }
}
