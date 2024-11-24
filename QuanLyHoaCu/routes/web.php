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
    Route::get('/shop/product/{productId}', [ShopController::class, 'shopDetail'])->name('product.shopDetail');
    Route::get('/cart', [CartController::class, 'listCart'])->name('cart.list');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{productId}', [CartController::class, 'deleteCart'])->name('cart.delete');
});
