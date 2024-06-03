<?php

use App\Http\Controllers\Api\Customer;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// get all customers
Route::get("/customer", [CustomerController::class, "index"]);

// create a new customer
Route::post("/customer/create", [CustomerController::class, "store"]);

// get specific customer
Route::get("/customer/{id}", [CustomerController::class, "show"]);

// update customer through the ID
Route::put("/customer/{id}", [CustomerController::class, "update"]);

// delete through the ID
Route::delete("/customer/{id}", [CustomerController::class, "destroy"]);