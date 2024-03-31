<?php

namespace Database\Factories;

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
            'total' => $this->faker->randomFloat(2, 1, 1000),
            'responsible_id' => $this->faker->numberBetween(1, 30),
            'tipo' => $this->faker->randomElement(['delivery', 'site']),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
