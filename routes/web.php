<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Customer\ProductController as BuyerProductController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use App\Http\Controllers\Customer\CommentController as CustomerCommentController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;

// Customer Routes
Route::prefix('/')->name('site.')->group(function () {
    Route::view('/', 'Index')
        ->name('home');

    Route::view('about', 'about-us')
        ->name('about');

    Route::view('contact', 'contact-us')
        ->name('contact');

    Route::get('products/categories/{cat_id}', CustomerCategoryController::class)
        ->name('categories.show');

    Route::get('/products', [BuyerProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/{product_id}', [BuyerProductController::class, 'show'])
        ->name('products.show');

    Route::get('/cart', [OrderController::class, 'index'])
        ->name('cart.index')
        ->middleware(['auth', 'role:customer']);

    Route::post('/comments', CustomerCommentController::class)
        ->name('comments.store')
        ->middleware(['auth', 'role:customer']);


});

// Seller Routes
Route::prefix('seller')
    ->middleware(['auth', 'role:seller'])
    ->name('seller.')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'sellerDashboard'])
            ->name('dashboard');

        Route::get('/products', [SellerProductController::class, 'index'])
            ->name('products.index');

        Route::get('/products/create', [SellerProductController::class, 'create'])
            ->name('products.create');

        Route::post('/products', [SellerProductController::class, 'store'])
            ->name('products.store');

        Route::get('/products/{product}/edit', [SellerProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/products/{product}', [SellerProductController::class, 'update'])
            ->name('products.update');

        Route::delete('/products/{product}', [SellerProductController::class, 'destroy'])
            ->name('products.destroy');

        Route::patch('/products/{product}/toggle-status', [SellerProductController::class, 'changeStatus'])
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
Route::prefix('admin')
//    ->middleware(['auth', 'role:admin|super_admin'])
    ->name('admin.')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'adminDashboard'])
            ->name('dashboard')
            ->middleware('log.user');

        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('categories.index');

        Route::view('/categories/create', 'admin.categories.create')
            ->name('categories.create');

        Route::post('/categories', [AdminCategoryController::class, 'store'])
            ->name('categories.store');

        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])
            ->name('categories.destroy');

        Route::get('/roles', [RoleController::class, 'index'])
            ->name('roles.index');

        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
            ->name('roles.edit');

        Route::put('/roles/{role}', [RoleController::class, 'update'])
            ->name('roles.update');

        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
            ->name('roles.destroy')
            ->middleware('role:super_admin');

        Route::view('/roles/create', 'admin.roles.create')
            ->name('roles.create')
            ->middleware('role:super_admin');

        Route::post('/roles', [RoleController::class, 'store'])
            ->name('roles.store')
            ->middleware('role:super_admin');

        Route::get('/products', [AdminProductController::class, 'index'])
            ->name('products.index');

        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])
            ->name('products.destroy');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('users.edit');

        Route::put('/users/{user}', [UserController::class, 'update'])
            ->name('users.update');

        Route::post('/products/{product_id}/restore', [AdminProductController::class, 'restore'])
            ->name('products.restore');

        Route::get('/comments', [AdminCommentController::class, 'index'])
            ->name('comments.index');

        Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])
            ->name('comments.destroy');
    });
