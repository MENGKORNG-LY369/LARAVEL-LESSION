<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Posts\ShowPostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Here are the posts',
            'data' => PostResource::collection(Post::list()),
            'post_count' => Post::list()->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::createOrUpdate($request);
        return response()->json([
            'success' => true,
            'message' => 'Successfully created the new post.',
            'data' => new ShowPostResource($post)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $post = Post::find($id);
        return $post ? response()->json([
            'success' => true,
            'message' => 'Here are the posts',
            'data' => new ShowPostResource($post),
        ], 200) : response()->json([
            'success' => false,
            'message' => 'post not found with id ' . $id,
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        return $post ? response()->json([
            'success' => true,
            'message' => 'Successfully updated',
            'data' => new ShowPostResource(Post::createOrUpdate($request, $id))
        ], 200) : response()->json([
            'success' => false,
            'message' => 'post not found with id ' . $id,
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
