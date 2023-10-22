<?php

namespace Konnec\VueEloquentApi\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class EloquentApiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /**
         * Route Macros
         */
        Route::macro('batch', function ($uri, $controller) {
            Route::post("{$uri}/batch", "{$controller}@batchStore");
            Route::patch("{$uri}/batch", "{$controller}@batchUpdate");
            Route::patch("{$uri}/batch-destroy", "{$controller}@batchDestroy");
        });

        /**
         * Response Macros
         */
        Response::macro('index', function ($data, $status = 200) {
            return response()->json([
                'data' => $data,
            ], $status);
        });
        Response::macro('show', function ($data, $status = 200) {
            return response()->json([
                'data' => $data,
            ], $status);
        });
        Response::macro('store', function ($data, $status = 201) {
            return response()->json([
                'data' => $data,
            ], $status);
        });
        Response::macro('update', function ($data, $status = 200) {
            return response()->json([
                'data' => $data,
            ], $status);
        });
        Response::macro('destroy', function ($data, $status = 200) {
            return response()->json([
                'data' => $data,
            ], $status);
        });

        $this->publishes([
            __DIR__ . '/../Config/eloquent-api.php' => config_path('eloquent-api.php'),
        ]);

        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}
