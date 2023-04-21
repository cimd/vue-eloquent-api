<?php

use Illuminate\Support\Facades\Route;
use Konnec\VueEloquentApi\Controllers\PostController;

Route::apiResource('eloquent-api-example/posts', PostController::class);
