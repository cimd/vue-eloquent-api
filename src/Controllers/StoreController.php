<?php

namespace Modules\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StoreController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $result = Cache::get($request->input('key'));

        return response()->json(['data' => $result], 200);
    }

    public function store(Request $request): JsonResponse
    {
        Cache::put($request->input('key'), $request->input('value'), $request->input('time'));

        return response()->json(['data' => Cache::get($request->input('key'))], 201);
    }

    public function destroy(Request $request): JsonResponse
    {
        Cache::forget($request->input('key'));

        return response()->json(['data' => null], 204);
    }
}
