<?php

use Konnec\Examples\Models\Comment;
use Konnec\Examples\Models\Post;
use Konnec\Examples\Models\User;

it('fetches with relations', function () {
    User::factory()->count(1)->create();
    Post::factory()->count(1)->create();
    Comment::factory()->count(2)->create();
    $response = $this->getJson('/posts?include=author,comments');

    $response->assertStatus(200);
    expect($response->json('data')[0])->toHaveKeys(['author', 'comments']);
});
