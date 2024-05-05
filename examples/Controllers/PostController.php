<?php

namespace Konnec\Examples\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Konnec\Examples\Models\Post;
use Konnec\Examples\Requests\PostStoreRequest;
use Konnec\Examples\Requests\PostUpdateRequest;
use Konnec\VueEloquentApi\Traits\HasBatchActions;

class PostController extends Controller
{
    use HasBatchActions;

    protected string $model = Post::class;

    protected array $requests = [
        'store' => PostStoreRequest::class,
        'update' => PostUpdateRequest::class,
    ];

    public function index(Request $request): JsonResponse
    {
        $result = Post::apiQuery($request);

        return response()->index($result);
    }

    public function store(PostStoreRequest $request): JsonResponse
    {
        $post = Post::create($request->validated());

        return response()->store($post);
    }

    public function show(Post $post): JsonResponse
    {
        return response()->show($post);
    }

    public function update(Request $request, Post $post): JsonResponse
    {
        $post->fill($request->all())->save();

        return response()->update($post);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->destroy($post);
    }
}
