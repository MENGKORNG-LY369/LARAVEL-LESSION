<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Likes\StoreLikeRequest;
use App\Http\Resources\Like\LikeResource;
use App\Http\Resources\Like\ShowLikeResource;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Here are the list of user like of all posts.',
            'data' => LikeResource::collection(Like::list()),
            'like_count' => Like::list()->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLikeRequest $request)
    {
        $like = Like::createOrUpdate($request);
        return response()->json([
            'success' => true,
            'message' => 'Successfully created the new post.',
            'data' => new ShowLikeResource($like)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
