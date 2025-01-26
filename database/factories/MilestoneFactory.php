<?php

namespace Database\Factories;

use App\Models\Grant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Milestone>
 */
class MilestoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grant_id' => Grant::inRandomOrder()->first()->id ?? null, // Select a random grant or null if none exist
            'milestone_name' => $this->faker->sentence(3), // Generate a short random sentence
            'target_completion_date' => $this->faker->dateTimeBetween('+1 week', '+6 months')->format('Y-m-d'), // Random future date
            'deliverable' => $this->faker->sentence(6), // Generate a random deliverable description
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']), // Random milestone status
            // 'remark' => $this->faker->optional()->sentence(), // Optional remarks
            // 'date_updated' => $this->faker->optional()->dateTimeThisYear()->format('Y-m-d H:i:s'), // Optional last update timestamp
        ];
    }
}
