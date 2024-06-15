<?php

use Konnec\Examples\Models\Post;

it('show with additional keys', function () {
    Post::factory()->count(1)->create();
    $response = $this->getJson('/posts/1');

    $response->assertStatus(200);
    expect($response->json())->toHaveKeys(['data', 'meta', 'links']);;
});
