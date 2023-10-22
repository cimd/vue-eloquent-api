<?php

namespace Konnec\Examples\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Konnec\Examples\Models\Post;
use Konnec\VueEloquentApi\Traits\HasBatchActions;

class PostController extends Controller
{
    use HasBatchActions;

    protected string $model = Post::class;

    public function index(Request $request): JsonResponse
    {
        $result = Post::apiQuery($request);

        return response()->index($result);
    }

    public function store(Request $request): array
    {
        $post = Post::create($request->all());

        return [
            'data' => $post->toArray(),
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

    public function destroy(Post $post): array
    {
        $post->delete();

        return [
            'data' => $post->toArray(),
        ];
    }
}
