<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\ShowProductResource;
use App\Http\Resources\ShowPromotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Promotion::list();
        $data = PromotionResource::collection($data);
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
        $data = Promotion::store($request);
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
        $promotion = Promotion::find($id);
        if ($promotion) {
            $promotion = new ShowPromotionResource($promotion);
            return response()->json([
                "success" => true,
                "message" => "The specified resource was successfully found",
                "data" =>  $promotion,
            ], 200);
        }
        return response()->json([
            "success" =>  false,
            "message" =>  "Category not found with the ID of $id",
            "data" =>  [],
        ], 404); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Promotion::find($id)) {
            return response()->json([
                "success" =>  false,
                "message" =>  "Something went wrong!",
                "data" =>  [],
            ], 500);
        }
        $data = Promotion::store($request, $id);
        return response()->json([
            "success" => $data ? true : false,
            "message" => $data ? 'Updated successfully' : "Something went wrong!",
            "data" => $data ? $data : [],
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
