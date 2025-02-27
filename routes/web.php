<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Trang chủ - Hiển thị danh sách sản phẩm

Route::get('/', [ProductController::class, 'index'])->name('home');

// Giỏ hàng
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

// Thanh toán
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Nhóm route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    // Quản lý sản phẩm
    Route::resource('products', ProductController::class);

    // Dashboard (chỉ truy cập khi đã xác thực email)
    Route::get('/dashboard', fn() => view('dashboard'))
        ->middleware('verified')
        ->name('dashboard');

    // Quản lý hồ sơ người dùng
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

// Nạp các route đăng nhập/đăng ký từ Laravel Breeze
require __DIR__.'/auth.php';
