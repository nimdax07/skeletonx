<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController; // 🛠️ Tambahkan ini!
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard hanya bisa diakses setelah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group untuk user yang sudah login
Route::middleware('auth')->group(function () {
    // Profile Routes (Dari Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // **💡 Admin Only: Kelola User**
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::resource('users', UserController::class);
    });

    // **💡 Admin & Marketing: Lihat Data Penjualan**
    Route::middleware([RoleMiddleware::class . ':marketing'])->group(function () {
        Route::resource('sales', SalesController::class);
    });
});

// Include route untuk auth (login, logout, register dari Breeze)
require __DIR__.'/auth.php';
