<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaggablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->dateTime('now'),
            'taggables_id' => function (array $attributes) {
                return $attributes['taggables_type']::factory();
            },
            'taggable_type' => $this->faker->randomElement([
                    'App\Models\Post'
                ]
            ),
            'updated_at' => $this->faker->dateTime('now')
        ];
    }
}
