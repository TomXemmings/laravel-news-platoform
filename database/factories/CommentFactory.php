<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 3),
            'post_id' => fake()->numberBetween(1, 14),
            'body' => fake()->paragraph(),
            'like' => fake()->numberBetween(1, 10),
            'dislike' => fake()->numberBetween(1, 10),
        ];
    }
}
