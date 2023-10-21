<?php

use Konnec\Examples\Models\Post;

test('basic', function () {
    $response = $this->get('/dashboard');

    $response->dumpHeaders();

    $response->dumpSession();

    $response->dump();

    $response->assertStatus(200);
});

test('filters', function () {
    Post::factory()->count(10)->create();
    $response = $this->getJson('/posts');

//    $response->dumpHeaders();
//
//    $response->dumpSession();
//
//    $response->dump();

    $response->assertStatus(200);
    expect($response->json())->toHaveCount(10);
});
