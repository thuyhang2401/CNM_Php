<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderCustomerController;
use App\Services\OrderCustomerService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('product.index');
});

//cac route danh cho staff
Route::middleware(['web'])->group(function () {
    
    // quản lý sản phẩm
    Route::resource('staff/products', ProductController::class);

    // quản lý đơn hàng
    Route::resource('/cart', CartController::class);

    // Thay đổi profile
    //Route::get('/staff/profile', [::class, 'export']);
});

Route::prefix('QuanLyHoaCu')->group(function () {
    Route::get('/index', [ShopController::class, 'index'])->name('product.index');
    Route::get('/shop', [ShopController::class, 'shop'])->name('product.shop');
    Route::get('/shop/product/{productId}', [ShopController::class, 'shopDetail'])->name('product.shopDetail');
    Route::get('/cart', [CartController::class, 'listCart'])->name('cart.list');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/checkout', [CartController::class, 'getSelectedProduct'])->name('cart.getSelected');
    Route::put('/cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{productId}', [CartController::class, 'deleteCart'])->name('cart.delete');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'createOrder'])->name('checkout.offline');
    Route::post('/checkout/vnpay', [CheckoutController::class, 'vnpayPayment'])->name('checkout.vnpay');
    Route::get('/checkout/vnpay-return', [CheckoutController::class, 'vnpayReturn'])->name('checkout.vnpay_return');

    Route::get('/orders', [OrderCustomerController::class, 'index'])->name('orders.index');
    Route::get('/orders/{orderId}', [OrderCustomerController::class, 'show'])->name('orders.show');
});
