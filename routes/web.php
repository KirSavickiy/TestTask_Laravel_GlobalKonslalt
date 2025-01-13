<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
// use App\Mail\ProductCreatedNotification;
// use Illuminate\Support\Facades\Mail;
// use App\Models\Product;


Route::get('/', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('product/{id}', [ProductController::class, 'show'])->middleware(['auth', 'verified'])->name('product.show');
Route::post('/product/store', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('product.edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('product.update');
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('product.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/send-email/{product}', function (Product $product) {
//     Mail::to('kirill.savickiy@yahoo.com')->send(new ProductCreatedNotification($product));
//     return response()->json(['message' => 'Email sent successfully']);
// });

require __DIR__.'/auth.php';
