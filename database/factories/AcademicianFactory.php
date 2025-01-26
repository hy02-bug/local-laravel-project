<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Academician>
 */
class AcademicianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => fake()->name(),
            'Email' => fake()->unique()->safeEmail(),
            'College' => fake()->randomElement(['UNITEN Putrajaya','UNITEN KSHAS']),
            'Department' => fake()->randomElement(['Computer Science','Engineering','Business','Mathematics','Artificial Intelligence']),
            'Position' => fake()->randomElement(  ['Professor', 'Assoc Professor', 'Lecturer', 'Senior Lecturer']),

        ];
    }
}
