<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// default redirect ke login
Route::get('/', function () {
    return redirect('/auth/login');
});

// Login routes
Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Logout
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');



Route::view('/dashboard/kasir/riwayat', 'dashboard.kasir.riwayat')->name('dashboard.kasir.riwayat');
Route::resource('/dashboard/produk/produkk', ProductController::class)->names('dashboard.produk');
Route::resource('/dashboard/produk/kategori', ProductCategoryController::class)->names('dashboard.produk.kategori');
Route::resource('/dashboard/kasir/pesanan', PesananController::class)->names('dashboard.kasir.pesanan');
