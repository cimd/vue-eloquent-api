<?php

test('filters', function () {
    $response = $this->getJson('/posts');

//    $response->dumpHeaders();
//
//    $response->dumpSession();
//
    $response->dump();

    $response->assertStatus(200);
});

//test('relations', function () {
//    $response = $this->getJson('/api/eloquent-api-example/posts?include=author,comments');
//
//    //    $response->dump(0);
//
//    $response->assertStatus(200);
//    expect($response[0]['author']['id'])->toEqual(1);
//    expect($response[0]['comments'])->toHaveCount(2);
//});
//
//test('filters + relations', function () {
//    $response = $this->getJson('/api/eloquent-api-example/posts?filter[author_id]=1&include=author,comments');
//
//    //    $response->dump(0);
//
//    $response->assertStatus(200);
//    expect($response[0]['id'])->toEqual(1);
//    expect($response[0]['author']['id'])->toEqual(1);
//    expect($response[0]['comments'])->toHaveCount(2);
//});
