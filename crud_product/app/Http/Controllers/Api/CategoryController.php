<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\ShowCategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::list();
        $categories = CategoryResource::collection($categories);

        return $categories ? response()->json([
            'success' => true,
            'message' => 'Category was successfully retrieved',
            'data' => $categories,
        ]) : response()->json([
            'success' => false,
            'message' => 'Something went wrong!',
            'data' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $category = Category::store($request);

        return $category ? response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Successfully created',
        ], 200) : response()->json([
            'success' => false,
            'data' => false,
            'message' => 'Something went wrong',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return $category ? response()->json([
            'success' => true,
            'message' => 'Category was successfully retrieved',
            'data' => new ShowCategoryResource($category)
        ]) : response()->json([
            'success' => false,
            'message' => 'Something went wrong!',
            'data' => false,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::store($request, $id);
        return $category ? response()->json([
            'success' => true,
            'message' => 'Update Successfully',
            'data' => $category
        ], 200) : response()->json([
            'success' => false,
            'message' => 'Something went wrong!',
            'data' => false
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
