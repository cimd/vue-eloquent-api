<?php

namespace Konnec\Examples\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Konnec\Examples\Models\Comment;
use Konnec\Examples\Models\Post;

class PostCommentController extends Controller
{
    public function index(Request $request, Post $post): JsonResponse
    {
//        $result = $post->load('comments');

//        return response()->index($post);
        return response()->json($post);
    }

    public function store(Request $request, Post $post): JsonResponse
    {
        $post = $post->comments()->create($request->all());

        return response()->store($post);
    }

    public function show(Post $post, Comment $comment): JsonResponse
    {
        return response()->show($comment);
    }

    public function update(Request $request, Post $post, Comment $comment): JsonResponse
    {
        $post->fill($request->all())->save();

        return response()->update($comment);
    }

    public function destroy(Post $post, Comment $comment): JsonResponse
    {
        $post->delete();

        return response()->destroy($comment);
    }
}
