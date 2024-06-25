<?php

use Konnec\Examples\Models\Post;

it('returns builder instance', function () {
    Post::factory()->count(1)->create(['title' => 'z']);
    $request = new Illuminate\Http\Request();

    $result = Post::apiQuery($request, true);

    expect($result)->toBeInstanceOf(Illuminate\Database\Eloquent\Builder::class);
});
