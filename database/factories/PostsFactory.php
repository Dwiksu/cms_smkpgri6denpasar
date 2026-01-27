<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titleName = fake()->sentence(rand(3, 5));
        return [
            'category_id' => Categories::factory(),
            'title' => $titleName,
            'slug' => str()->slug($titleName),
            'content' => fake()->paragraph(rand(10, 15)),
            'thumbnail' => fake()->imageUrl(),
            'status' => fake()->randomElement(['publish', 'draft']),
            'published_at' => now(),
        ];
    }
}