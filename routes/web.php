<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SidebarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Seller\ProductController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\CategoryController;

// Customer Routes
Route::prefix('/')->name('site.')->group(function () {
    Route::view('/', 'Index')->name('home');
    Route::view('about', 'about-us')->name('about');
    Route::view('contact', 'contact-us')->name('contact');
});

// Seller Routes
Route::prefix('seller')
//    ->middleware(['auth', 'role:فروشنده'])
    ->name('seller.')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'sellerDashboard'])
            ->name('dashboard');

        Route::get('/products', [ProductController::class, 'index'])
            ->name('products.index');

        Route::get('/products/create', [ProductController::class, 'create'])
            ->name('products.create');

        Route::post('/products', [ProductController::class, 'store'])
            ->name('products.store');

        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/products/{product}', [ProductController::class, 'update'])
            ->name('products.update');

        Route::delete('/products/{product}', [ProductController::class, 'destroy'])
            ->name('products.destroy');

        Route::patch('/products/{product}/toggle-status', [ProductController::class, 'changeStatus'])
            ->name('products.changeStatus');
    });

// Auth Roles
Route::view('/login', 'auth.login')->name('login.form');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/logout', [AuthController::class, 'showLogoutError']);

// Admin Routes
Route::get('/products/categories/{id}')->name('categories.show');

Route::prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'adminDashboard'])
            ->name('dashboard');

        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories.index');

        Route::view('/categories/create', 'admin.categories.create')
            ->name('categories.create');

        Route::post('/categories', [CategoryController::class, 'store'])
            ->name('categories.store');

        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::put('categories/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');
    });
