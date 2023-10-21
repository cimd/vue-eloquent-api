<?php

use Illuminate\Support\Facades\Route;
use Konnec\Examples\Controllers\PostController;
use Konnec\VueEloquentApi\Controllers\ModelController;
use Konnec\VueEloquentApi\Controllers\StateController;

//use Konnec\VueEloquentApi\Controllers\StoreController;

Route::get('/posts', [PostController::class, 'index']);

Route::prefix('/api/v1/eloquent-api')->group(function () {
    Route::apiResource('models', ModelController::class);
    Route::apiResource('states', StateController::class);
//    Route::apiResource('stores', StoreController::class)->only('index', 'store', 'destroy');
});


Route::get('/testing', function () {
    return 'Dashboard route tests';
});

Route::get('/dashboard', function () {
    return 'Dashboard route tests';
});
