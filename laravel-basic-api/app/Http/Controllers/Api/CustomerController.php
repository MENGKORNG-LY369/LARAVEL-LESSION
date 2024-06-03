<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['success' => true, 'data' => Customer::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create([
            "name" => $request->name,
            "age" => $request->age,
            "gender" => $request->gender,
            "phone" => $request->phone,
            "email" => $request->email,
            "date_of_birth" => $request->date_of_birth
        ]);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'Successfully created'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return $customer !== null ?  ["message" => "No such Customer was found."] : response()->json(['success' => true, 'data' => $customer, 'message' => 'Successfully created' ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->name = $request->name;
            $customer->age = $request->age;
            $customer->gender = $request->gender;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->date_of_birth = $request->date_of_birth;

            $customer->save();
            return "Success";
        }
        return ["message" => "Something went wrong!"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
            return $customer;
        }
        return ["message" => "Something went wrong!"];
    }
}