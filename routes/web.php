<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'publicIndex'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes untuk User
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/browse', [UserController::class, 'browse'])->name('browse');
        Route::get('/bid-history', [UserController::class, 'bidHistory'])->name('bid-history');
        Route::get('/watchlist', [UserController::class, 'watchlist'])->name('watchlist');
        Route::get('/item/{id}', [UserController::class, 'itemDetail'])->name('item-detail');
    });

    // Routes untuk Penjual
    Route::middleware('role:penjual')->prefix('penjual')->name('penjual.')->group(function () {
        Route::get('/dashboard', [PenjualController::class, 'dashboard'])->name('dashboard');
        Route::get('/add-item', [PenjualController::class, 'addItem'])->name('add-item');
        Route::get('/manage-items', [PenjualController::class, 'manageItems'])->name('manage-items');
        Route::get('/sales-report', [PenjualController::class, 'salesReport'])->name('sales-report');
        Route::get('/item/{id}', [PenjualController::class, 'itemDetail'])->name('item-detail');
    });

    // Routes untuk Admin
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/verifikasi-barang', [AdminController::class, 'verifikasiBarang'])->name('verifikasi-barang');
        Route::get('/kelola-user', [AdminController::class, 'kelolaUser'])->name('kelola-user');
        Route::get('/kelola-lelang', [AdminController::class, 'kelolaLelang'])->name('kelola-lelang');
        Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');

        // Admin actions for items (approve/reject)
        Route::post('/item/{id}/approve', [AdminController::class, 'approveItem'])->name('item.approve');
        Route::post('/item/{id}/reject', [AdminController::class, 'rejectItem'])->name('item.reject');
        
        // Admin article management
        Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('articles.index');
        Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
        
        // Admin landing sections (menu explanations)
        Route::get('/landing-sections', [\App\Http\Controllers\LandingSectionController::class, 'index'])->name('landing_sections.index');
        Route::get('/landing-sections/create', [\App\Http\Controllers\LandingSectionController::class, 'create'])->name('landing_sections.create');
        Route::post('/landing-sections', [\App\Http\Controllers\LandingSectionController::class, 'store'])->name('landing_sections.store');
        Route::get('/landing-sections/{id}/edit', [\App\Http\Controllers\LandingSectionController::class, 'edit'])->name('landing_sections.edit');
        Route::put('/landing-sections/{id}', [\App\Http\Controllers\LandingSectionController::class, 'update'])->name('landing_sections.update');
        Route::delete('/landing-sections/{id}', [\App\Http\Controllers\LandingSectionController::class, 'destroy'])->name('landing_sections.destroy');
    });

    // Public article show
    Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
});

require __DIR__.'/auth.php';
