<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Resources\Users\ShowUserResource;
use App\Http\Resources\Users\UserCommentPostResource;
use App\Http\Resources\Users\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserResource::collection(User::list());
        return response()->json([
            'success' => true,
            'message' => 'Here are the users available.',
            'data' => $users,
            'user_count' => $users->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::createOrUpdate($request);
        return $user ? response()->json([
            'success' => true,
            'message' => 'Successfully created new user.',
            'data' => new ShowUserResource($user),
        ], 200) : response()->json([
            'success' => true,
            'message' => 'Error to create new user!',
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return $user ? response()->json([
            'success' => true,
            'message' => 'successfully found user with id ' . $id,
            'data' => new ShowUserResource($user)
        ]) : response()->json([
            'success' => false,
            'message' => 'user not found with id ' . $id,
            'data' => false
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    public function userCommentPost() {
        $userCommentPosts = User::list();
        return response()->json([
            'success' => true,
            'message' => 'Here are the list of user with posts, comments and likes',
            'data' => UserCommentPostResource::collection($userCommentPosts)
        ], 200);
    }
}