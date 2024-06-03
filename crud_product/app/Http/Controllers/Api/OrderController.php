<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderResource;
use App\Http\Resources\Orders\ShowOrderResource;
use App\Http\Resources\Products\ShowProductResource;
use App\Http\Resources\User\UserResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Here are the lists of all orders.',
            'data' => OrderResource::collection(Order::list()),
            'order_count' => Order::list()->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::store($request);
        
        return $order ? response()->json([
            'success' => true,
            'data' => $order,
            'message' => 'Successfully created',
        ], 200) : response()->json([
            'success' => false,
            'data' => false,
            'message' => 'Something went wrong',
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        return $order ? response()->json([
            'success' => true,
            'message' => 'Successfully retrieved the resource with id ' . $id,
            'data' => new ShowOrderResource($order)

        ], 200) : response()->json([
            'success' => false,
            'message' => 'Order not found with id ' . $id,
            'data' => false
        ], 404);
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
