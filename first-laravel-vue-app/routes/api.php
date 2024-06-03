<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\LibraryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Library
Route::get('/library', [LibraryController::class, 'index']);
Route::post('/library/create', [LibraryController::class, 'store']);

// create create book
Route::get('/book', [BookController::class, 'index']);