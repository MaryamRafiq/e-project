<?php

namespace Database\Factories;
use App\Models\Testing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testing>
 */
class TestingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     */    protected $model = Testing::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,  // Random word for the name
            'description' => $this->faker->sentence,  // Random sentence for description
            'role' => $this->faker->randomElement(['admin', 'editor', 'user']),  // Random role selection
            'status' => $this->faker->randomElement(['active', 'inactive']),  // Random status selection
        ];
    }
}
