<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 🔐 Authenticated + Verified Users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 👤 Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // 🛡️ Admin-only Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return 'Welcome, Admin! 🚀';
        })->name('admin.panel');
    });
});

require __DIR__.'/auth.php';