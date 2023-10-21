<?php

use Konnec\Examples\Models\Post;

it('select fields', function () {
    Post::factory()->count(1)->create();
    $response = $this->getJson('/posts?fields=id,title');

    $response->assertStatus(200);
    expect($response->json('data')[0])->toHaveKeys(['id', 'title'])
        ->and($response->json('data')[0])->not->toHaveKey('description');
});
