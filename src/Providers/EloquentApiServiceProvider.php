<?php

namespace Konnec\VueEloquentApi\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class EloquentApiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../Config/eloquent-api.php' => config_path('eloquent-api.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');
    }
}
