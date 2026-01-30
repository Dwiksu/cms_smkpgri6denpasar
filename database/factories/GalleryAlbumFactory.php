<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GalleryAlbum>
 */
class GalleryAlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(2, true);

        return [
            'name' => ucfirst($name),
            'slug' => str()->slug($name),
            'description' => fake()->sentence(),
            'cover_image' => fake()->imageUrl(800, 600),
            'meta_title' => ucfirst($name),
            'meta_description' => fake()->sentence(15),
        ];
    }
}