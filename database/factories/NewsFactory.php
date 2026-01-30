<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $newsTitle = fake()->sentence(rand(2, 4));
        return [
            'title' => $newsTitle,
            'slug' => str()->slug($newsTitle),
            'excerpt' => fake()->paragraph(rand(10, 15)),
            'content' => fake()->paragraphs(rand(5, 8), true),
            'category_id' => NewsCategory::factory(),
            'image' => fake()->imageUrl(1200, 800),
            'author' => fake()->name(),
            'published_at' => now(),
            'meta_title' => $newsTitle,
            'meta_description' => fake()->sentence(rand(12, 18)),
        ];
    }
}