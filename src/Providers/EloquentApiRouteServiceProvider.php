<?php

namespace Konnec\VueEloquentApi\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class EloquentApiRouteServiceProvider extends ServiceProvider
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

        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}
