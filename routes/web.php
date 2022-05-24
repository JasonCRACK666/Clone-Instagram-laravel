<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// AUTH
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// USER
Route::get('/{username}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->middleware('auth');

// POSTS
Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/post/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/post', [PostController::class, 'store'])->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('auth');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->middleware('auth');

// COMMENTS
Route::post('/posts/{post}/comments/create', [CommentController::class, 'store'])->middleware('auth');
Route::get('/posts/comments/{comment}/edit', [CommentController::class, 'edit'])->middleware('auth');
Route::put('/posts/comments/{comment}', [CommentController::class, 'update'])->middleware('auth');
Route::delete('/posts/comments/{comment}/delete', [CommentController::class, 'destroy'])->middleware('auth');
