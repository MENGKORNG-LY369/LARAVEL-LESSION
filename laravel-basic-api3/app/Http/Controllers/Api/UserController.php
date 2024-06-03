<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::list();
        return response()->json(['success' => true, 'data' => $users], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'User created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => $user ? true : false,
            'message' => $user ? 'Here is a user' : 'User not found',
            'data' => $user ? $user : [],
        ], $user ? 200 : 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::store($request, $id);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'User updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user ? $user->delete() : null;
        return response()->json([
            'success' => $user ? true : false,
            'message' => $user ?  'User deleted successfully' : 'User not found'
        ]);
    }
}