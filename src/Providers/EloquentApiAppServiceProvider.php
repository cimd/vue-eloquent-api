<?php

namespace Konnec\VueEloquentApi\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class EloquentApiAppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
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
    }
}
