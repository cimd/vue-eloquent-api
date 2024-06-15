<?php

namespace Konnec\VueEloquentApi\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    public function boot(): void
    {
        /**
         * Response Macros
         */
        Response::macro('index', function ($data, $status = 200) {
            return response()->json(
                (! isset($data['data']) ? ['data' => $data] : $data),
                $status
            );
        });
        Response::macro('show', function ($data, $status = 200) {
            return response()->json(
                (! isset($data['data']) ? ['data' => $data] : $data),
                $status);
        });
        Response::macro('store', function ($data, $status = 201) {
            return response()->json(
                (! isset($data['data']) ? ['data' => $data] : $data),
                $status
            );
        });
        Response::macro('update', function ($data, $status = 200) {
            return response()->json(
                (! isset($data['data']) ? ['data' => $data] : $data),
                $status
            );
        });
        Response::macro('destroy', function ($data, $status = 200) {
            return response()->json(
                (! isset($data['data']) ? ['data' => $data] : $data),
                $status
            );
        });

        $this->publishes([
            __DIR__ . '/../Config/eloquent-api.php' => config_path('eloquent-api.php'),
        ]);
    }
}
