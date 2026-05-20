<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserProfileController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\TagController;

// Auth routes (public)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:api')->group(function () {

    Route::post('/logout',  [AuthController::class, 'logout']);
    Route::get('/me',       [AuthController::class, 'getUserProfile']);

    // Users - admin only for write/delete
    Route::get('/users',         [UserController::class, 'index']);
    Route::get('/users/{id}',    [UserController::class, 'show']);
    Route::post('/users',        [UserController::class, 'store'])->middleware('role:admin');
    Route::put('/users/{id}',    [UserController::class, 'update'])->middleware('role:admin');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('role:admin');

    // User Profiles
    Route::get('/user-profiles',         [UserProfileController::class, 'index']);
    Route::get('/user-profiles/{id}',    [UserProfileController::class, 'show']);
    Route::post('/user-profiles',        [UserProfileController::class, 'store'])->middleware('role:admin,manager');
    Route::put('/user-profiles/{id}',    [UserProfileController::class, 'update'])->middleware('role:admin,manager');
    Route::delete('/user-profiles/{id}', [UserProfileController::class, 'destroy'])->middleware('role:admin');

    // Products - admin & manager can write, admin only delete
    Route::get('/products',         [ProductController::class, 'index']);
    Route::get('/products/{id}',    [ProductController::class, 'show']);
    Route::post('/products',        [ProductController::class, 'store'])->middleware('role:admin,manager');
    Route::put('/products/{id}',    [ProductController::class, 'update'])->middleware('role:admin,manager');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('role:admin');

    // Categories - admin & manager can write, admin only delete
    Route::get('/categories',         [CategoryController::class, 'index']);
    Route::get('/categories/{id}',    [CategoryController::class, 'show']);
    Route::post('/categories',        [CategoryController::class, 'store'])->middleware('role:admin,manager');
    Route::put('/categories/{id}',    [CategoryController::class, 'update'])->middleware('role:admin,manager');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware('role:admin');

    // Tags - admin & manager can write, admin only delete
    Route::get('/tags',                                [TagController::class, 'index']);
    Route::get('/tags/{id}',                           [TagController::class, 'show']);
    Route::post('/tags',                               [TagController::class, 'store'])->middleware('role:admin,manager');
    Route::put('/tags/{id}',                           [TagController::class, 'update'])->middleware('role:admin,manager');
    Route::delete('/tags/{id}',                        [TagController::class, 'destroy'])->middleware('role:admin');
    Route::put('/products/{productId}/tag/{tagId}',    [TagController::class, 'attachToProduct'])->middleware('role:admin,manager');
    Route::delete('/products/{productId}/tag/{tagId}', [TagController::class, 'detachFromProduct'])->middleware('role:admin');

    // Orders - all authenticated can create, admin & manager can update status
    Route::get('/orders',             [OrderController::class, 'index']);
    Route::get('/orders/{id}',        [OrderController::class, 'show']);
    Route::post('/orders',            [OrderController::class, 'store']);
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->middleware('role:admin,manager');
    Route::delete('/orders/{id}',     [OrderController::class, 'destroy'])->middleware('role:admin');
});
