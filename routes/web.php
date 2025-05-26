<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route tampilan stock
// Menggunakan middleware, jadi tidak bis alangsung /stock melainkan harus /login/stock
Route::middleware('auth')->prefix('login')->group(function () {
    // Route untuk tanpilan stock
    Route::get('/stock', [StockController::class, 'tampil'])->name('stock.tampil');
    // Route menambahkan stock
    Route::get('/stock/tambah', [StockController::class, 'tambah'])->name('stock.tambah');
    // Route submit/konfirmasi penambahan barang stock
    Route::post('/stock/submit', [StockController::class, 'submit'])->name('stock.submit');
    // Route edit barang stock yang sudah ditambahkan (methodnya GET)
    // Pastikan untuk pakai {id} karena diedit nya per ID
    Route::get('/stock/edit/{id}', [StockController::class, 'edit'])->name('stock.edit');
    Route::post('/stock/edit/update/{id}', [StockController::class, 'update'])->name('stock.update');
    // Route delete untuk menghapus barang
    Route::post('/stock/edit/delete/{id}', [StockController::class, 'delete'])->name('stock.delete');
});