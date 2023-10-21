<?php

namespace Workbench\Database\Seeders;

use Illuminate\Database\Seeder;
use Konnec\Examples\Models\Comment;
use Konnec\Examples\Models\Post;
use Konnec\Examples\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(4)->create();
        Post::factory(5)->create();
        Comment::factory(10)->create();
    }
}
