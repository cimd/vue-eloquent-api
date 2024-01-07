<?php

use Konnec\Examples\Models\Post;

it('sort ASC', function () {
    Post::factory()->count(1)->create(['title' => 'z']);
    Post::factory()->count(1)->create(['title' => 'a']);
    $response = $this->getJson('/posts?sort=+title');

    $response->assertStatus(200);
    expect($response->json('data')[0]['title'])->toBe('a');
});

it('sort ASC without sign', function () {
    Post::factory()->count(1)->create(['title' => 'z']);
    Post::factory()->count(1)->create(['title' => 'a']);
    $response = $this->getJson('/posts?sort=title');

    $response->assertStatus(200);
    expect($response->json('data')[0]['title'])->toBe('a');
});

it('sort ASC with sign', function () {
    Post::factory()->count(1)->create(['title' => 'z']);
    Post::factory()->count(1)->create(['title' => 'a']);
    $response = $this->getJson('/posts?sort=+title');

    $response->assertStatus(200);
    expect($response->json('data')[0]['title'])->toBe('a');
});

it('sort DESC', function () {
    Post::factory()->count(1)->create(['title' => 'a']);
    Post::factory()->count(1)->create(['title' => 'z']);
    $response = $this->getJson('/posts?sort=-title');

    $response->assertStatus(200);
    expect($response->json('data')[0]['title'])->toBe('z');
});

it('sort title ASC and id DESC', function () {
    Post::factory()->count(1)->create(['title' => 'z']);
    Post::factory()->count(1)->create(['title' => 'a']);
    Post::factory()->count(1)->create(['title' => 'z']);
    Post::factory()->count(1)->create(['title' => 'a']);

    $response = $this->getJson('/posts?sort=+title,-id');

    $response->assertStatus(200);
    expect($response->json('data')[0]['title'])->toBe('a')->and($response->json('data')[0]['id'])->toEqual(4)
        ->and($response->json('data')[3]['title'])->toBe('z')->and($response->json('data')[3]['id'])->toEqual(1);
});
