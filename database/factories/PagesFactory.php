<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pages>
 */
class PagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tilleName = fake()->sentence(rand(3, 5));
        return [
            'title' => $tilleName,
            'slug' => str()->slug($tilleName),
            'content' => fake()->paragraph(rand(10, 15)),
            'meta_title' => $tilleName,
            'meta_description' => fake()->sentence(rand(10, 15)),
            'status' => fake()->randomElement(['publish', 'draft']),
        ];
    }
}