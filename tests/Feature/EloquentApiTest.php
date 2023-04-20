<?php

test('filters', function () {
    $response = $this->getJson('/api/posts?filter[author_id]=1');
    var_dump(json_encode($response));
    ob_flush();
    expect(true)->toBeTrue();
});

test('relations', function () {
    $response = $this->getJson('/api/posts?include=posts');

    expect(true)->toBeTrue();
});
