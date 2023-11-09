<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                'nombre' => $this->faker->unique()->name,
                'dni' => $this->faker->unique()->numerify('########'),
                'email' => $this->faker->unique()->safeEmail,
                'telefono' => $this->faker->unique()->numerify('#########'),
                'direccion' => $this->faker->address,
        ];
    }
}
