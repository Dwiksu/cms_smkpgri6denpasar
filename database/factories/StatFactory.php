<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stat>
 */
class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $label = fake()->words(2, true);

        return [
            'key' => str()->slug($label),
            'label' => ucfirst($label),
            'value' => fake()->numberBetween(10, 5000),
        ];
    }
}