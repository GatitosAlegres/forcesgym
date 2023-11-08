<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RemisionGuide>
 */
class RemisionGuideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'guia_code' => 'GR-' . $this->faker->unique()->numberBetween(1000, 9000) . '-' . now()->year,
            'artifact' => $this->getArtifact('remision_guide.jpg'),
            'RUC_carrier' => '20' . $this->faker->unique()->numberBetween(11111111, 99999999) . '1',
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'delivery_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'according' => $this->faker->boolean(),
        ];
    }

    private function getArtifact($name)
    {
        return 'remision_guides/' . $name;
    }
}
