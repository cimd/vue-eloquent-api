<?php

namespace Konnec\VueEloquentApi\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StoreController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $result = Cache::get($request->input('key'));

        return response()->json([
            'data' => $result,
            'store' => $request->input('key'),
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        Cache::put($request->input('key'), $request->input('value'), $request->input('time'));

        return response()->json([
            'data' => Cache::get($request->input('key')),
            'store' => $request->input('key'),
        ], 201);
    }

    public function destroy(string $store): JsonResponse
    {
        Cache::forget($store);

        return response()->json(['data' => null], 204);
    }
}
