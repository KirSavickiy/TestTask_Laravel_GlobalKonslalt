<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('product/{id}', [ProductController::class, 'show'])->middleware(['auth', 'verified'])->name('product.show');
Route::post('/product/store', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('product.edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('product.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
