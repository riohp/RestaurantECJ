<?php

namespace Database\Factories;

use App\Models\Cooking;
use Illuminate\Database\Eloquent\Factories\Factory;

class CookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'location' => $this->faker->address,
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
