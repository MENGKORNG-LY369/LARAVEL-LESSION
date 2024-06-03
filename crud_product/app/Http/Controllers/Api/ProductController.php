<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Products\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::list();
        $products = ProductResource::collection($products);

        return $products ? response()->json([
            'success' => true,
            'message' => 'Category was successfully retrieved',
            'data' => $products,
        ]) : response()->json([
            'success' => false,
            'message' => 'Something went wrong!',
            'data' => false,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::store($request);
        return $product ? response()->json([
            'success' => true,
            'message' => 'Successfuly created a new product',
            'data' => $product
        ]) : response()->json([
            'success' => false,
            'message' => 'Failed to create a new product',
            'data' => false
        ]);
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
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::store($request, $id);
        return $product ? response()->json([
            'success' => true,
            'message' => 'Successfuly update product',
            'data' => $product
        ]) : response()->json([
            'success' => false,
            'message' => 'Failed to update product',
            'data' => false
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
