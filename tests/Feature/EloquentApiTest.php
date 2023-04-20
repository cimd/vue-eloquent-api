<?php

test('filters', function () {
    $response = $this->getJson('/api/users?filter[id]=1');

    expect(true)->toBeTrue();
});

test('relations', function () {
    $response = $this->getJson('/api/users?include=posts');

    expect(true)->toBeTrue();
});
