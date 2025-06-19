<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
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

// Route forgot password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendReset'])->name('password.email');
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Menggunakan middleware 'auth'
// Jadi kalau ketik langsung /stock, maka akan dikemablikan ke halaman login
Route::middleware(['auth'])->group(function () {
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
    Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

    // Route untuk menampilkan list penjualan
    Route::get('/penjualan', [PenjualanController::class, 'tampil'])->name('penjualan.tampil');
    // Route untuk menampilkan form tambah penjualan
    Route::get('/penjualan/tambah', [PenjualanController::class, 'tambah'])->name('penjualan.tambah');
    // Route submit/konfirmasi penambahan penjualan
    Route::post('/penjualan/submit', [PenjualanController::class, 'submit'])->name('penjualan.submit');
    // Route edit penjualan berdasarkan id
    Route::get('/penjualan/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    // Route update penjualan
    Route::post('/penjualan/update/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    // Route delete penjualan
    Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

    // Route untuk menampilkan list supplier
    Route::get('/supplier', [SupplierController::class, 'tampil'])->name('supplier.tampil');
    // Route untuk menampilkan form tambah supplier
    Route::get('/supplier/tambah', [SupplierController::class, 'tambah'])->name('supplier.tambah');
    // Route submit/konfirmasi penambahan supplier
    Route::post('/supplier/submit', [SupplierController::class, 'submit'])->name('supplier.submit');
    // Route edit supplier berdasarkan id
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
    // Route update supplier
    Route::post('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    // Route delete supplier
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    // Route untuk menampilkan list user
    Route::get('/user', [UserController::class, 'tampil'])->name('user.tampil');
    // Route untuk menampilkan form tambah user
    Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
    // Route submit/konfirmasi penambahan user (method POST)
    Route::post('/user/submit', [UserController::class, 'submit'])->name('user.submit');
    // Route edit user yang sudah ditambahkan (method GET)
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    // Route update user berdasrakan id (method POST)
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    // Route delete user berdasarakan id (method DELETE)
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

