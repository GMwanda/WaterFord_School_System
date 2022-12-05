<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'course_name' => fake()->word(),
            'faculty_id' => fake()->numberBetween(2, 5),
            'lecturer_id' => fake()->numberBetween(1, 12)
        ];
    }
}
