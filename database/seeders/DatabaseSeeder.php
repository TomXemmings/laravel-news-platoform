<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'name' => fake()->lastName(),
            'surname' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'photo' => fake()->imageUrl(200, 200),
            'number' => '+7(123)123-12-31',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
            'role_id' => 1,
        ]);

        \App\Models\User::factory(1)->create([
            'name' => fake()->lastName(),
            'surname' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'photo' => fake()->imageUrl(200, 200),
            'number' => '+7(123)123-12-32',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
            'role_id' => 2,
        ]);

        \App\Models\User::factory(1)->create([
            'name' => fake()->lastName(),
            'surname' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'photo' => fake()->imageUrl(200, 200),
            'number' => '+7(123)123-12-33',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
            'role_id' => 3,
        ]);

        \App\Models\User::factory(1)->create([
            'name' => fake()->lastName(),
            'surname' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'photo' => fake()->imageUrl(200, 200),
            'number' => '+7(123)123-12-34',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
            'role_id' => 4,
        ]);

        \App\Models\Post::factory(30)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Quote::factory(10)->create();
        \App\Models\Ad::factory(1)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\City::factory(10)->create();
        \App\Models\Region::factory(10)->create();
        \App\Models\District::factory(10)->create();
    }
}
