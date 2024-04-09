<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
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
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'cost' => $this->faker->randomFloat(2, 1, 1000),
            'category_id' => $this->faker->numberBetween(1, 80),
            'status' => $this->faker->randomElement([0, 1]),
            'image' => $this->faker->imageUrl(640, 480),
            
        ];
    }
}
