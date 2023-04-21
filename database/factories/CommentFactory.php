<?php

namespace Illuminate\Support\Facades\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Konnec\VueEloquentApi\Models\Comment;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'post_id' => 1,
            'user_id' => 1,
            'comment' => fake()->text(),
        ];
    }
}
