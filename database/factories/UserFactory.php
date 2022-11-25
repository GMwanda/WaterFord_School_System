<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $admin = fake()->randomElement(['0', '1', '2']);
        $image = fake()->randomElement(['avatar-angela-gray.webp', 'avatar-anna-kim.webp', 'avatar-jacob-thompson.webp', 'avatar-kimberly-smith.webp', 'avatar-mark-webber.webp', 'avatar-nathan-peterson.webp', 'avatar-rizky-hasanuddin.webp']);
        return [
            'name' => fake()->name(),
            'gender' => 'Male',
            'DOB' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'image' => $image,
            'email_verified_at' => now(),
            'is_admin' => $admin,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
