<?php

namespace Konnec\VueEloquentApi\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class StateController extends Controller
{
    private mixed $key;

    private bool $is_allowed;

    public function __construct(Request $request)
    {
        $this->middleware('auth:sanctum')->except(['index']);

        $this->key = $request->input('key');
        $this->is_allowed = ! in_array($this->key, config('eloquent-api.blocked_cache_keys'));

        Log::withContext([
            'key' => $request->get('key'),
            'allowed' => $this->is_allowed,
        ]);
    }

    public function index(Request $request): JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Key not allowed'], 403);
        }

        $result = Cache::get($this->key);

        return response()->json(['data' => $result], 200);
    }

    public function store(Request $request): JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Key not allowed'], 403);
        }

        Cache::put($this->key, $request->input('value'), $request->input('time'));

        return response()->json(['data' => Cache::get($this->key)], 201);
    }

    public function update(Request $request, int $id): array|JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Key not allowed'], 403);
        }

        Cache::put($this->key, $request->input('value'), $request->input('time'));

        return response()->json(['data' => Cache::get($this->key)], 202);
    }

    public function destroy(Request $request, int $id): array|JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Key not allowed'], 403);
        }

        Cache::forget($this->key);

        return response()->json(['data' => null], 204);
    }
}
