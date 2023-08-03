<?php

namespace Konnec\VueEloquentApi\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $result = Post::apiQuery($request);

        return response()->json($result);
    }

    public function store(Request $request): array
    {
        $post = Post::create($request->all());

        return [
            'data' => $post->fresh()->toArray(),
        ];
    }

    public function storeBatch(Request $request): array
    {
        $result = [];
        foreach ($request->data as $item) {
            $line = $this->store(new Request($item));
            array_push($result, $line['data']);
        }

        return [
            'data' => $result,
        ];
    }

    public function show(Post $post): array
    {
        return [
            'data' => $post->toArray(),
        ];
    }

    public function update(Request $request, Post $post): array
    {
        $post->fill($request->all())->save();

        return [
            'data' => $post->toArray(),
        ];
    }

    public function updateBatch(Request $request): array
    {
        $result = [];
        foreach ($request->data as $item) {
            $line = $this->update(new Request($item), $item['id']);
            array_push($result, $line['data']);
        }

        return [
            'data' => $result,
        ];
    }

    public function destroy(Post $post): array
    {
        $post->delete();

        return [
            'data' => $post->toArray(),
        ];
    }

    public function destroyBatch(Request $request): array
    {
        $result = [];
        foreach ($request->data as $item) {
            $line = $this->destroy(new Request($item), $item['id']);
            array_push($result, $line['data']);
        }

        return [
            'data' => $result,
        ];
    }
}
