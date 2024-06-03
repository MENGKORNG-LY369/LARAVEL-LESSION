<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User routes:
Route::post('/user/create', [UserController::class, 'store'])->name('user.create');

// Category routes:
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.create');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');

// Product routes:
Route::post('/product/create', [ProductController::class, 'store'])->name('product.create');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product', [ProductController::class, 'index'])->name('product');

// Order routes:
Route::post('/order/create', [OrderController::class, 'store'])->name('order.create');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order/show/{id}', [OrderController::class, 'show'])->name('order.show');

// OrderDetails routes:
Route::get('/orderDetail', [OrderDetailController::class, 'index'])->name('orderDetail');