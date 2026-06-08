<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hero>
 */
class HeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);

        return [
            'title' => $title,
            'subtitle' => fake()->sentence(6),
            'tagline' => fake()->sentence(8),
            'cta_text' => fake()->randomElement([
                'Daftar Sekarang',
                'Lihat Profil',
                'Pelajari Lebih Lanjut',
            ]),
            'cta_link' => fake()->randomElement([
                '/ppdb',
                '/profil',
                '/tentang',
            ]),
            'background_image' => fake()->imageUrl(1600, 900, 'school'),
        ];
    }
}