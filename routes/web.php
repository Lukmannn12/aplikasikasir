<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::view('/dashboard/kasir/pesanan', 'dashboard.kasir.pesanan')->name('dashboard.kasir.pesanan');
Route::view('/dashboard/kasir/riwayat', 'dashboard.kasir.riwayat')->name('dashboard.kasir.riwayat');
Route::view('/dashboard/produk/index', 'dashboard.produk.index')->name('dashboard.produk.index');
Route::view('/dashboard/produk/kategori', 'dashboard.produk.kategori')->name('dashboard.produk.kategori');
