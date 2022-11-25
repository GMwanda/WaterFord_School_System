<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id'=>fake()->numberBetween(1, 25),
            'faculty_id' => fake()->numberBetween(1, 6),
            'course_teaching' => fake()->numberBetween(1, 9)
        ];
    }
}
