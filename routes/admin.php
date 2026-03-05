<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FavoriteController as AdminFavoriteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/admin', [ProductController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/products/{picture}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/admin/products/{picture}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/products/{picture}', [ProductController::class, 'update'])->name('admin.product.update');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::patch('/admin/users/{user}/toggle-admin', [UserController::class, 'toggleAdmin'])->name('admin.users.toggle-admin');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

    Route::get('/admin/favorites', [AdminFavoriteController::class, 'index'])->name('admin.favorites.index');
    Route::delete('/admin/favorites/{favorite}', [AdminFavoriteController::class, 'destroy'])->name('admin.favorites.destroy');
});