<?php

use Illuminate\Support\Facades\Route;
use Konnec\VueEloquentApi\Controllers\ModelController;
use Konnec\VueEloquentApi\Controllers\StateController;

Route::prefix('/api/v1/eloquent-api')->group(function () {
    Route::apiResource('models', ModelController::class);
    Route::apiResource('states', StateController::class);
//    Route::apiResource('stores', StoreController::class)->only('index', 'store', 'destroy');
});
