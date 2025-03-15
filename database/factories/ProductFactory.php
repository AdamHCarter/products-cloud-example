<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'name' => fake()->word(),
            'price' => fake()->randomFloat(2, 0.01),
            'description' => fake()->sentence(),
            'item_number' => fake()->randomNumber(5, true),
            'image' => 'https://picsum.photos/seed/' . fake()->randomNumber(5, true) . '/300/200',
        ];
    }
}
