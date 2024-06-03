<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::list();
        $data = ProductResource::collection($data);
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
        $data = Product::store($request);
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
        $cate = Product::find($id);
        if ($cate) {
            $cate = new ProductResource($cate);
            return response()->json([
                "success" => true,
                "data" =>  $cate,
                "message" => "The specified resource was successfully found"
            ], 200);
        }
        return response()->json([
            "success" =>  false,
            "data" =>  [],
            "message" =>  "Category not found with the ID $id"
        ], 404); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Product::find($id)) {
            return response()->json([
                "success" =>  false,
                "data" =>  [],
                "message" =>  "Something went wrong!"
            ], 500);
        }
        $data = Product::store($request, $id);
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
        //
    }
}
