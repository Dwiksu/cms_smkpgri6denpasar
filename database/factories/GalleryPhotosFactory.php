<?php

namespace Database\Factories;

use App\Models\Galleries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GalleryPhotos>
 */
class GalleryPhotosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gallery_id' => Galleries::factory(),
            'image' => fake()->imageUrl(),
            'caption' => fake()->sentence(rand(3, 5)),
        ];
    }
}