<?php

use Konnec\Examples\Models\Post;

it('show response', function () {
    Post::factory()->create(['id' => 1]);
    $response = $this->getJson('/posts/1');
    //    dump($response->json());

    $response->assertStatus(200);
    //    expect($response->json('data')['id'])->toEqual(1);
});
