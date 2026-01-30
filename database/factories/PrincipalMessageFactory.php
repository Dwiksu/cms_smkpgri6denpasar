<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrincipalMessage>
 */
class PrincipalMessageFactory extends Factory
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
            'photo' => fake()->imageUrl(400, 400),
            'position' => 'Kepala Sekolah',
            'period' => '2023–2027',
            'message' => fake()->paragraphs(2, true),
        ];
    }
}