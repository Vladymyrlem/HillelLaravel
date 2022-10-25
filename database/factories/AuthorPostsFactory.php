<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AuthorPostsFactory extends Factory
{
    protected $user = User::class;
    protected $post = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->random(1,10),
            'author_posts_id' => function (array $attributes) {
                return $attributes['author_posts_type']::factory();
            },
            'author_posts_type' => $this->faker->randomElement([
                    'App\Models\Post'
                ]
            ),
            'created_at' => $this->faker->dateTime('now'),
            'updated_at' => $this->faker->dateTime('now')
        ];
    }

//    public function forPosts()
//    {
//        return $this->state(function (array $attributes) {
//            return [
//                'author_posts_type' => $this->post->getMorphClass(),
//                'author_posts_id' => function (array $attributes) {
//                    return $attributes['author_posts_type']::factory();
//                },
//            ];
//        });
//    }
//
//    public function forUser()
//    {
//        return $this->state(function (array $attributes){
//            return [
//                'author_posts_type' => $this->faker->randomElement([
//                        'App\Models\Post'
//                    ]
//                ),
//                'user_id' => function (array $attributes) {
//                    return $attributes['posts_type']::factory();
//                },
//            ];
//        });
//    }
}
