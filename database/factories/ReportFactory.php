<?php

namespace Database\Factories;

use App\Models\Testing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,  // Random sentence for the report title
            'content' => $this->faker->paragraph,  // Random paragraph for the content
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),  // Random status
            'user_id' => User::factory(),  // Create a random user for the user_id foreign key
            'testing_id' => Testing::factory(),  // Create a random testing record for the testing_id foreign key
        ];
    }
}
