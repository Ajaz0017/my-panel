<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\BlogApiController;

Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{product}', [ProductApiController::class, 'show']);


Route::get('/blogs', [BlogApiController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogApiController::class, 'show']);
