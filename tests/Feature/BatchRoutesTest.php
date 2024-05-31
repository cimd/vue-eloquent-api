<?php

use Konnec\Examples\Models\Post;

it('stores', function () {
    $request = [
        'author_id' => 1,
        'readers_id' => [1, 2],
        'title' => 'Title 1',
        'description' => fake()->name,
    ];
    $response = $this->postJson('/posts', $request);

    $response->assertStatus(201);
});

it('stores batch', function () {
    $request = [
        'data' => [
            [
                'author_id' => 1,
                'readers_id' => [1, 2],
                'title' => 'Title 1',
                'description' => fake()->name,
            ],
            [
                'author_id' => 1,
                'readers_id' => [1, 2],
                'title' => 'Title 2',
                'description' => fake()->name,
            ],
        ],
    ];
    $response = $this->postJson('/posts/batch', $request);

    $response->assertStatus(201);
    expect($response->json('data'))->toHaveCount(2);
});

it('updates batch', function () {
    Post::factory()->count(2)->create();
    $request = [
        'data' => [
            [
                'id' => 1,
                'title' => 'abc',
            ],
            [
                'id' => 2,
                'title' => 'zxy',
            ],
        ],
    ];
    $response = $this->patchJson('/posts/batch', $request);

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(2);
});

it('deletes batch', function () {
    Post::factory()->count(2)->create();
    $request = [
        'data' => [
            [
                'id' => 1,
                'title' => 'abc',
            ],
            [
                'id' => 2,
                'title' => 'zxy',
            ],
        ],
    ];
    $response = $this->patchJson('/posts/batch-destroy', $request);

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(2);
});
