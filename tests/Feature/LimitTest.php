<?php

use Konnec\Examples\Models\Post;

it('limit returns only the requested number of records', function () {
    Post::factory()->count(3)->create();
    $response = $this->getJson('/posts?limit=1');

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(1);
});

it('limit works along with sort', function () {
    Post::factory()->count(1)->create(['title' => 'a']);
    Post::factory()->count(1)->create(['title' => 'z']);
    $response = $this->getJson('/posts?sort=-title&limit=1');

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(1)->and($response->json('data')[0]['title'])->toBe('z');
});

it('limit larger than the number of records returns all of them', function () {
    Post::factory()->count(2)->create();
    $response = $this->getJson('/posts?limit=10');

    expect($response->json('data'))->toHaveCount(2);
});

it('limit caps the page size when used along with paginate', function () {
    Post::factory()->count(5)->create();
    $response = $this->getJson('/posts?limit=1&paginate[page]=1&paginate[pageSize]=3');

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(1)
        ->and($response->json('meta.paginate.pageSize'))->toBe(3);
});

it('limit keeps the pagination offset', function () {
    Post::factory()->count(5)->create();
    $response = $this->getJson('/posts?sort=id&limit=1&paginate[page]=2&paginate[pageSize]=2');

    expect($response->json('data'))->toHaveCount(1)->and($response->json('data')[0]['id'])->toEqual(3);
});
