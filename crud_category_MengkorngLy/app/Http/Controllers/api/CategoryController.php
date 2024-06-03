<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ShowCategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::list();
        $data = CategoryResource::collection($data);
        return response()->json([
            "success" => $data ? true : false,
            "message" => $data ? 'Here are the data' : "Something went wrong!",
            "data" => $data ? $data : [],
        ], $data ? 200 : 500);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Category::store($request);
        return response()->json([
            "success" => $data ? true : false,
            "data" => $data ? $data : [],
            "message" => $data ? 'Created successfully' : "Something went wrong!"
        ], $data ? 200 : 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cate = Category::find($id);
        if ($cate) {
            $cate = new ShowCategoryResource($cate);
            return response()->json([
                "success" => true,
                "message" => "The specified resource was successfully found",
                "data" =>  $cate,
            ], 200);
        }
        return response()->json([
            "success" =>  false,
            "message" =>  "Category not found with the ID $id",
            "data" =>  [],
        ], 404); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Category::find($id)) {
            return response()->json([
                "success" =>  false,
                "data" =>  [],
                "message" =>  "Something went wrong!"
            ], 500);
        }
        $data = Category::store($request, $id);
        return response()->json([
            "success" => $data ? true : false,
            "data" => $data ? $data : [],
            "message" => $data ? 'Updated successfully' : "Something went wrong!"
        ], $data ? 200 : 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cate = Category::destroy($id);
        return response()->json([
            'success' => $cate ? true : false,
            'message' => $cate  ? 'Deleted successfully' : 'Something went wrong',
        ]);
    }
}
