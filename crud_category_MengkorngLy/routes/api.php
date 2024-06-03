<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\PromotionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

// Category routes
Route::get('/cate/list', [CategoryController::class, 'index'])->name('cate.list');
Route::get('/cate/{id}', [CategoryController::class, 'show'])->name('cate');
Route::post('/cate/create', [CategoryController::class, 'store'])->name('cate.create');
Route::put('/cate/update/{id}', [CategoryController::class, 'update'])->name('cate.update');
Route::delete('/cate/delete/{id}', [CategoryController::class, 'destroy'])->name('cate.delete');

// Product routes
Route::get('/product/list', [ProductController::class, 'index'])->name('product.list');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product');
Route::post('/product/create', [ProductController::class, 'store'])->name('product.create');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

// Promotion routes
Route::post('/promotion/create', [PromotionController::class, 'store'])->name('promotion.create');
Route::put('/promotion/update/{id}', [PromotionController::class, 'update'])->name('promotion.update');
Route::get('/promotion/list', [PromotionController::class, 'index'])->name('promotion.list');
Route::get('/promotion/show/{id}', [PromotionController::class, 'show'])->name('promotion.show');