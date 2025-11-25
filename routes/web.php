<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes untuk User
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->middleware('role:user')->name('user.dashboard');

    // Routes untuk Penjual
    Route::get('/penjual/dashboard', [PenjualController::class, 'dashboard'])->middleware('role:penjual')->name('penjual.dashboard');

    // Routes untuk Admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('role:admin')->name('admin.dashboard');
});

require __DIR__.'/auth.php';
