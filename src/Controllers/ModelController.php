<?php

namespace Konnec\VueEloquentApi\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModelController extends Controller
{
    private readonly mixed $model;

    private readonly bool $is_allowed;

    public function __construct(Request $request)
    {
        $this->middleware('auth:sanctum')->except(['index']);
        $this->model = config('eloquent-api.models')[$request->input('model')];
        $this->is_allowed = in_array($this->model, config('eloquent-api.models'));
        Log::withContext([
            'model' => $request->get('model'),
            'model-instance' => $this->model,
        ]);
    }

    public function index(Request $request): JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Model not allowed'], 403);
        }

        $result = ($this->model)::get();

        return response()->json(['data' => $result], 200);
    }

    public function store(Request $request): JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Model not allowed'], 403);
        }

        $result = ($this->model)::create($request->all());

        return response()->json(['data' => $result], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Model not allowed'], 403);
        }

        $model = ($this->model)::find($id);
        $model->fill($request->all())->save();

        return response()->json(['data' => $model], 202);
    }

    public function destroy(int $id): JsonResponse
    {
        if (! $this->is_allowed) {
            return response()->json(['message' => 'Model not allowed'], 403);
        }

        $model = ($this->model)::find($id);
        $model->delete();

        return response()->json(['data' => $model], 200);
    }
}
