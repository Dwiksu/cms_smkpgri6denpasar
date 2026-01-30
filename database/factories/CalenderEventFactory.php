<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalenderEvent>
 */
class CalenderEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('now', '+1 month');

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'start_date' => $start,
            'end_date' => fake()->dateTimeBetween($start, '+3 days'),
            'category' => 'kegiatan',
            'color' => fake()->hexColor(),
        ];
    }
}