<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorPostsFactory extends Factory
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
            'posts_id' => function (array $attributes) {
                return $attributes['posts_type']::factory();
            },
        'posts_type' => $this->faker->randomElement([
        'App\Models\Post'
       ]
        ),
            'updated_at' => $this->faker->dateTime('now')
        ];
    }
}
