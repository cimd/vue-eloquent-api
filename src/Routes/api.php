<?php

use Illuminate\Support\Facades\Route;
use Konnec\VueEloquentApi\Controllers\StoreController;

Route::prefix(config('eloquent-api.api_prefix') . '/eloquent-api')->group(function () {
    Route::apiResource('stores', StoreController::class)->only('index', 'store', 'destroy');
});
