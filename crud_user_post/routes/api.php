<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user routes
Route::post('/users',  [UserController::class, 'store'])->name('user.register');
Route::get('/users',  [UserController::class, 'index'])->name('user.list');
Route::get('/users/{id}',  [UserController::class, 'show'])->name('user.show');
Route::put('/users/{id}',  [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}',  [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user_post_comments', [UserController::class, 'userCommentPost'])->name('user.post.omment');

// post routes
Route::post('/posts', [PostController::class, 'store'])->name('posts.create');
Route::get('/posts', [PostController::class, 'index'])->name('posts.list');
Route::get('/posts/{id}',  [PostController::class, 'show'])->name('posts.show');
Route::put('/posts/{id}',  [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}',  [PostController::class, 'destroy'])->name('posts.destroy');

// comment routes
Route::post('/comments', [CommentController::class, 'store'])->name('comments.create');
Route::get('/comments', [CommentController::class, 'index'])->name('comments.list');
Route::get('/comments/{id}',  [CommentController::class, 'show'])->name('comments.show');
Route::put('/comments/{id}',  [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{id}',  [CommentController::class, 'destroy'])->name('comments.destroy');

// like routes
Route::post('/likes', [LikeController::class, 'store'])->name('likes.create');
Route::get('/likes', [LikeController::class, 'index'])->name('likes.list');
Route::get('/likes/{id}',  [LikeController::class, 'show'])->name('likes.show');
Route::put('/likes/{id}',  [LikeController::class, 'update'])->name('likes.update');
Route::delete('/likes/{id}',  [LikeController::class, 'destroy'])->name('likes.destroy');