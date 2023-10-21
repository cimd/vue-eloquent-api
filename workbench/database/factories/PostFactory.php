<?php

namespace Workbench\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Konnec\Examples\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'author_id' => 1,
            'readers_id' => [1, 2],
            'title' => fake()->paragraph(),
            'description' => fake()->text(),
        ];
    }
}
