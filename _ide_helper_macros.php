<?php

// @formatter:off
// phpcs:ignoreFile

/**
 * IDE/PHPStan stub for the response macros registered in
 * Konnec\VueEloquentApi\Providers\ServiceProvider. Never loaded at runtime.
 */

namespace Illuminate\Contracts\Routing {
    interface ResponseFactory
    {
        public function index(mixed $data, int $status = 200): \Illuminate\Http\JsonResponse;

        public function show(mixed $data, int $status = 200): \Illuminate\Http\JsonResponse;

        public function store(mixed $data, int $status = 201): \Illuminate\Http\JsonResponse;

        public function update(mixed $data, int $status = 200): \Illuminate\Http\JsonResponse;

        public function destroy(mixed $data, int $status = 200): \Illuminate\Http\JsonResponse;
    }
}
