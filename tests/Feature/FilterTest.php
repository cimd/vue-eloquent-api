<?php

use Konnec\Examples\Models\Comment;
use Konnec\Examples\Models\Post;
use Konnec\Examples\Models\User;

it('gets index', function () {
    Post::factory()->count(2)->create();
    $response = $this->getJson('/posts');

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(2);
});

it('filters by id', function () {
    Post::factory()->count(2)->create(['author_id' => 1]);
    Post::factory()->count(2)->create(['author_id' => 2]);

    $request = [
        'filter' => [
            'author_id' => 1,
        ],
    ];
    $response = $this->call('GET', '/posts', $request);

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(2);
});

it('filters and relations', function () {
    User::factory()->count(1)->create();
    Post::factory()->count(1)->create();
    Comment::factory()->count(2)->create();
    $response = $this->getJson('/posts?filter[author_id]=1&include=author,comments');

    $response->assertStatus(200);
    expect($response->json('data')[0]['id'])->toEqual(1)
        ->and($response->json('data')[0]['author']['id'])->toEqual(1)
        ->and($response->json('data')[0]['comments'])->toHaveCount(2);
});

it('WhereIn filter', function () {
    Post::factory()->count(5)->create();

    $request = [
        'filter' => [
            'id' => [1, 2],
        ],
    ];
    $response = $this->call('GET', '/posts', $request);

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(2);
});

it('WhereLike filter', function () {
    Post::factory()->count(1)->create(['title' => 'My Title 1']);
    Post::factory()->count(1)->create(['title' => 'My Title 2']);
    Post::factory()->count(1)->create(['title' => 'Different Post']);

    $request = [
        'filter' => [
            'title' => 'Title',
        ],
    ];
    $response = $this->call('GET', '/posts', $request);

    $response->assertStatus(200);
    expect($response->json('data'))->toHaveCount(2);
});
