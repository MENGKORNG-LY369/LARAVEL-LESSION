<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Category routes
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.create');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/category/{id}', [CategoryController::class, 'show'])->name('category');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

// Product routes
Route::post('/product/create', [ProductController::class, 'store'])->name('product.create');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/product/{id}', [ProductController::class, 'show'])->name('product');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

