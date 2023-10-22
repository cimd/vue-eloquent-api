<?php

use Konnec\Examples\Models\Post;

it('sort ASC', function () {
    Post::factory()->count(10)->create();
    $request = [
        'page' => ''
    ];
    $response = $this->call('GET','/posts', $request);

//    $response->assertStatus(200);
    dump($response->json('data'));
})->skip();
