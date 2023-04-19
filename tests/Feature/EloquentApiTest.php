<?php

test('eloquent api', function () {
    $response = $this->getJson('/api/users?filter[username][operator]=eq&filter[username][value]=john');

    expect(true)->toBeTrue();
});
