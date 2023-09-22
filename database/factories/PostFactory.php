<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->text(250),
            'body' => fake()->text(),
            'photo' => fake()->imageUrl(fake()->numberBetween(100, 1000), fake()->numberBetween(100, 1000)),
            'user_id' => fake()->numberBetween(1, 10),
            'category_id' => fake()->numberBetween(1, 10),
            'region_id' => fake()->numberBetween(1, 10),
            'city_id' => fake()->numberBetween(1, 10),
            'district_id' => fake()->numberBetween(1, 10),
            'privilege' => fake()->numberBetween(1, 3),
            'status' => 1,
        ];
    }
}
