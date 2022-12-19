<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $course = fake()->randomElement(['1', '2', '5', '8']);
        return [
            'UserId' => fake()->numberBetween(1, 20),
            'CourseEnrolled' => $course,
        ];
    }
}
