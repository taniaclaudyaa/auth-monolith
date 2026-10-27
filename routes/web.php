<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Controllers\AdminDashboardController;
Route::get('/', function () {
    return redirect('/login');
});

// Route untuk admin (memerlukan Login + role admin)[cite: 11]
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

// Route untuk user biasa (memerlukan login)[cite: 11]
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');
});