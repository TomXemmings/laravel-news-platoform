<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->lastName(),
            'surname' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'photo' => fake()->imageUrl(200, 200),
            'number' => fake()->e164PhoneNumber(),
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
            'role_id' => fake()->numberBetween(1, 5),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
