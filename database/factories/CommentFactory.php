<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

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
