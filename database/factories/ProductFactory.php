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
            'name' => $this->faker->word,  // Random word for the product name
            'image' => $this->faker->imageUrl(),  // Random image URL
            'description' => $this->faker->paragraph,  // Random description (a paragraph of text)
            'price' => $this->faker->randomFloat(2, 10, 1000),  // Random price between 10 and 1000 with 2 decimal places
            'quantity' => $this->faker->numberBetween(1, 100),  // Random quantity between 1 and 100
            'status' => $this->faker->randomElement(['active', 'inactive']),  // Random status, either 'active' or 'inactive'
            'category_id' => $this->faker->numberBetween(1, 10),  // Random category_id between 1 and 10 (you can adjust the range)
        ];
    }
}
