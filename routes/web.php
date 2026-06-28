<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// halaman login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// halaman setelah login
Route::middleware('auth')->group(function () {

    // tampil data
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    // tambah data
    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    // edit data
    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('products.update');

    // hapus data
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    Route::get('/products/download-pdf',[ProductController::class,'downloadPdf'])->name('products.pdf');
});