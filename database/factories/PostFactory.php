<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
            // User_ID richiama il model user e il metodo factory crea un utente fake e viene collegato al post
            'user_id' => User::factory(),
        ];
    }
}
