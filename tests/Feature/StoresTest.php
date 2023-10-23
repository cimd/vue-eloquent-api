<?php

it('fetches store', function () {
    $key = 'userStore';
    $value = 1;
    $request = [
        'key' => $key,
    ];
    Cache::put($key, $value);
    $response = $this->call('GET', config('eloquent-api.api_prefix') . '/eloquent-api/stores', $request);
    $response->assertStatus(200);
    expect($response->json())->toHaveKeys(['data', 'store']);
});

it('updates store', function () {
    $key = 'userStore';
    $request = [
        'key' => $key,
        'value' => 1,
    ];
    $response = $this->postJson(config('eloquent-api.api_prefix') . '/eloquent-api/stores', $request);
    $response->assertStatus(201);
    expect($response->json())->toHaveKeys(['data', 'store'])
        ->and(Cache::has($key))->toBeTruthy();
});

it('deletes store', function () {
    $key = 'userStore';
    $response = $this->deleteJson(config('eloquent-api.api_prefix') . '/eloquent-api/stores/' . $key);

    $response->assertStatus(204);
    expect(Cache::has($key))->toBeFalsy();
});
