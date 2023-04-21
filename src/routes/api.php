<?php

use Illuminate\Support\Facades\Route;
use Konnec\VueEloquentApi\Controllers\PostController;

Route::apiResource('posts', PostController::class);
