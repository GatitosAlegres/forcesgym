<?php

namespace Database\Factories;
use App\Models\Customer;
use App\Models\User;
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
        // Crear un usuario con nombre "Admin" si no existe
        $adminUser = User::firstOrCreate(['name' => 'Admin'], [
            'email' => 'admin@example.com', // Puedes ajustar el correo electrónico según tus necesidades
            'password' => bcrypt('password'), // Puedes ajustar la contraseña según tus necesidades
            // Otros campos del usuario si es necesario
        ]);
        return [
                'code' => $this->faker->randomElement(['Boleta', 'Factura']),
                'cliente_id' => Customer::inRandomOrder()->first()->id,
                'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
                'amount' => $this->faker->randomFloat(2, 100, 1000), // Ajusta los valores mínimo y máximo según tus necesidades.
                'user_id' => $adminUser->id,
        ];
    }
}
