<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user',function(){
//     return "User Page!";
// });

// Route::get('/about',function(){
//     return "About Page!";
// });

Route::get('/user',[UserController::class,'index']);
Route::get('/about',[AboutController::class,'index']);

