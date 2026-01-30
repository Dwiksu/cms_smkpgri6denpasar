<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Tentang Sekolah',
            'description' => fake()->paragraph(),
            'vision' => fake()->sentence(),
            'mission' => fake()->sentences(3),
            'history' => fake()->paragraph(),
            'image' => fake()->imageUrl(800, 600),
            'meta_title' => 'Profil Sekolah',
            'meta_description' => fake()->sentence(15),
        ];
    }
}