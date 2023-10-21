<?php

use Konnec\Examples\Models\Post;

it('appends attribute', function () {
    Post::factory()->count(1)->create();
    $response = $this->getJson('/posts?append=short_title');

    $response->assertStatus(200);
    expect($response->json('data')[0])->toHaveKey('short_title');
});
