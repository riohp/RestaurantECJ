<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'cellphone' => $this->faker->phoneNumber,
            'id_table' => $this->faker->numberBetween(1, 10),
            'start_time' => $this->faker->dateTime,
            'end_time' => $this->faker->dateTime,
        ];
    }
}
