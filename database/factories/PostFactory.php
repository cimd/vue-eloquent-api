<?php

namespace Illuminate\Support\Facades\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Konnec\VueEloquentApi\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'author_id' => 1,
            'readers_id' => [1, 2],
            'title' => fake()->text(),
            'description' => fake()->text(),
        ];
    }
}
