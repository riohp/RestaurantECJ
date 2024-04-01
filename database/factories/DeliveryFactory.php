<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1, 30),
            'cellphone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'invoice_id' => $this->faker->numberBetween(1, 30),
            'status' => $this->faker->randomElement([0, 1]),

        ];
    }
}
