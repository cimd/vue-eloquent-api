<?php

use Konnec\Examples\Models\Post;

it('has data and meta keys', function () {
    Post::factory()->count(5)->create();
    $request = [
        'paginate' => [
            'page' => 3,
            'pageSize' => 2,
        ],
    ];
    $response = $this->call('GET', '/posts', $request);

    $response->assertStatus(200);
    expect($response->json())->toHaveKey('data')
        ->and($response->json())->toHaveKey('meta');
});

it('doesnt have meta key', function () {
    Post::factory()->count(5)->create();
    $request = [];
    $response = $this->call('GET', '/posts', $request);

    $response->assertStatus(200);
    expect($response->json())->not()->toHaveKey('meta');
});
