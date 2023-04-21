<?php

namespace Konnec\VueEloquentApi\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Konnec\VueEloquentApi\Models\Post;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $result = Post::apiQuery($request);

        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
