<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Academician;
use App\Models\Grant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grant>
 */
class GrantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'project_leader_id' => Academician::inRandomOrder()->first()->id ?? null,
            'Title' => $this->faker->sentence(5), // Random title
            'Amount' => $this->faker->randomFloat(2, 5000, 100000), // Random grant amount between 5k and 100k
            'Provider' => $this->faker->company, // Random company name
            'Start_Date' => $this->faker->date(), // Random date
            'Duration_months' => $this->faker->numberBetween(6, 36),
        ];
    }
}
