<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nip' => fake()->numerify('################'),
            'position' => 'Guru',
            'subject' => fake()->word(),
            'major' => fake()->word(),
            'photo' => fake()->imageUrl(400, 400),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'education' => fake()->randomElement(['S1', 'S2', 'S3']),
        ];
    }
}