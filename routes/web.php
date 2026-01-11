<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard']);
    Route::get('users', [UserController::class, 'index']);
    Route::middleware('manager')->group(function () {
        Route::get('users/create', [UserController::class, 'create']);
        Route::post('/users', [UserController::class, 'store']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
        Route::get('/users/{user}/edit', [UserController::class, 'edit']);
        Route::put('/users/{user}', [UserController::class, 'update']);
    });

    // products routes
    Route::get('products', [ProductController::class, 'index']);
    Route::middleware('product.access')->group(function () {
        Route::get('products/create', [ProductController::class, 'create']);
        Route::post('/products', [ProductController::class, 'store']);
        Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
        Route::put('/products/{product}', [ProductController::class, 'update']);
        Route::delete('/products/images/{image}', [ProductController::class, 'destroyImage']);
        Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    });

    // blogs routes
    Route::get('blogs', [BlogController::class, 'index']);
    Route::middleware('blog.access')->group(function () {
        Route::get('blogs/create', [BlogController::class, 'create']);
        Route::post('/blogs', [BlogController::class, 'store']);
        Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit']);
        Route::put('/blogs/{blog}', [BlogController::class, 'update']);
        Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);
    });
});