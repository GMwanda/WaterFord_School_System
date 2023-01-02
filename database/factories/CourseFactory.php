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
        $s = strtotime("now");
        $e = strtotime("+ 3 Months", $s);
        return [
            //
            'course_name' => fake()->word(),
            'faculty_id' => fake()->numberBetween(2, 5),
            'lecturer_id' => fake()->numberBetween(1, 12),
            'start_date' => date('Y-m-d', $s),
            'end_date' => date('Y-m-d', $e)
        ];
    }
}
