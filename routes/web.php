<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PictureController::class, 'index'])->name('home');
Route::get('/pictures/{picture}', [PictureController::class, 'show'])->name('pictures.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/pictures/{picture}/favorite', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/pictures/{picture}/favorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
});

require __DIR__.'/auth.php';
