<?php

namespace Konnec\Examples\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Konnec\Examples\Models\Post;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $result = Post::apiQuery($request);

        return response()->json(['data' => $result]);
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
            $post = Post::find($item['id']);
            $line = $this->destroy($post);
            array_push($result, $line['data']);
        }

        return [
            'data' => $result,
        ];
    }
}
