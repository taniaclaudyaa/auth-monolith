<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Controllers\AdminDashboardController;
use Modules\Auth\Controllers\Auth\AuthenticatedSessionController;

require base_path('app/Modules/Auth/routes/auth.php');

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

// Route untuk user biasa (memerlukan login)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');
});