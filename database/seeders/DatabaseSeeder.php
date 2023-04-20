<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'Jane Lines',
            'email' => 'jane.lines@example.com',
        ]);

        Post::factory()->create([
            'author_id' => 1,
            'title' => 'Post 1',
            'description' => 'Description 1',
        ]);
        Post::factory()->create([
            'author_id' => 2,
            'title' => 'Post 2',
            'description' => 'Description 2',
        ]);

        Comment::factory()->create([
            'post_id' => 1,
            'user_id' => 1,
            'comment' => 'Comment 1',
        ]);
        Comment::factory()->create([
            'post_id' => 1,
            'user_id' => 2,
            'comment' => 'Comment 2',
        ]);
        Comment::factory()->create([
            'post_id' => 2,
            'user_id' => 1,
            'comment' => 'Comment 3',
        ]);
    }
}
