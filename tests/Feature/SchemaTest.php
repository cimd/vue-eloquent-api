<?php

use Konnec\Examples\Models\Post;

it('fetches schema', function () {
    Post::factory()->count(1)->create();
    $response = $this->getJson('/posts?include=schema');
    dump($response);

    $response->assertStatus(200);
    expect($response->json('data')[0])->toHaveKey('schema');
})->skip();
