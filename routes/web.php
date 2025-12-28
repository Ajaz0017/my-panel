<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use App\Http\Middleware\LocationChecker;
use App\Http\Middleware\GenderChecker;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('sign-up', [AuthController::class, 'SignUp']);
Route::post('register', [AuthController::class, 'register']);
Route::view('login', 'login');
Route::post('login-user', [AuthController::class, 'login']);

// Route::get('home', [HomeController::class, 'home'])->middleware('access');
// Route::middleware('access')->group(function(){
//     Route::view('/', 'welcome');
//     Route::get('home', [HomeController::class, 'home']);
// });

// Route::view('about', 'about')->middleware([LocationChecker::class, GenderChecker::class]);
// Route::get('/', [HomeController::class, 'home']);
Route::get('/', [DashboardController::class, 'dashboard']);
Route::get('users', [UserController::class, 'user']);
Route::get('users/create', [UserController::class, 'create']);
Route::get('products', [ProductController::class, 'product']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('upload', [UploadController::class, 'upload']);