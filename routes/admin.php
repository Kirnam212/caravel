<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/products/{picture}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/admin/products/{picture}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/products/{picture}', [ProductController::class, 'update'])->name('admin.product.update');
});