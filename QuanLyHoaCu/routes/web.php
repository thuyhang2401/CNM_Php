<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('product.index');
});

Route::prefix('QuanLyHoaCu')->group(function () {
    Route::get('/index', [ShopController::class, 'index'])->name('product.index');
    Route::get('/shop', [ShopController::class, 'shop'])->name('product.shop');
    Route::get('/shop/product', [ShopController::class, 'shopDetail'])->name('product.detail');
    Route::get('/cart', [CartController::class, 'listCart'])->name('cart.list');
});
