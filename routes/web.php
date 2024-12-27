<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/data', [DashboardController::class, 'getChartData'])->name('dashboard.data');




Route::get('/', function () {
    return view('welcome');
})->name('home');

// Show register form
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');

// Show login form
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle register submission
Route::post('register', [AuthController::class, 'register'])->name('register.store');

// Handle login submission
Route::post('login', [AuthController::class, 'login'])->name('login.store');

// Handle logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::resource('/users', UserController::class);
Route::get('/users/{user}/delete', [UserController::class, 'destroy'])->middleware('auth');
Route::resource('/categories', CategoryController::class);
Route::get('/categories/{category}/delete', [CategoryController::class, 'destroy'])->middleware('auth');
Route::resource('/products', ProductController::class);
Route::get('/products/{product}/delete', [ProductController::class, 'destroy'])->middleware('auth');
Route::resource('/testings', TestingController::class);
Route::get('/testings/{testing}/delete', [TestingController::class, 'destroy'])->middleware('auth');
Route::resource('/reports', ReportController::class);
Route::get('/reports/{report}/delete', [ReportController::class, 'destroy'])->middleware('auth');

