<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderCustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AccountController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('product.index');
});

Route::prefix('QuanLyHoaCu')->group(function () {
    // view products in shop 
    Route::get('/index', [ShopController::class, 'index'])->name('product.index');
    Route::get('/shop', [ShopController::class, 'shop'])->name('product.shop');
    Route::get('/shop/product/{productId}', [ShopController::class, 'shopDetail'])->name('product.shopDetail');

    // management cart 
    Route::get('/cart', [CartController::class, 'listCart'])->name('cart.list');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/checkout', [CartController::class, 'getSelectedProduct'])->name('cart.getSelected');
    Route::put('/cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{productId}', [CartController::class, 'deleteCart'])->name('cart.delete');

    // payment
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'createOrder'])->name('checkout.offline');
    Route::post('/checkout/vnpay', [CheckoutController::class, 'vnpayPayment'])->name('checkout.vnpay');
    Route::get('/checkout/vnpay-return', [CheckoutController::class, 'vnpayReturn'])->name('checkout.vnpay_return');

    // order
    Route::get('/orders', [OrderCustomerController::class, 'index'])->name('orderscus.index');
    Route::get('/orders/{orderId}', [OrderCustomerController::class, 'show'])->name('orderscus.show');

    // edit customer profile
    Route::get('customer/profile', [CustomerController::class, 'showProfile'])->name('customer.profile');
    Route::put('customer/profile', [CustomerController::class, 'updateProfile'])->name('customer.updateProfile');
    Route::get('customer/password', [CustomerController::class, 'showChangePassword'])->name('customer.password');
    Route::put('customer/password', [CustomerController::class, 'updatePassword'])->name('customer.updatePassword');
});

//cac route danh cho staff
Route::middleware(['web'])->group(function () {
    
    // quản lý sản phẩm
    Route::resource('staff/products', ProductController::class);

    // quản lý đơn hàng
    Route::resource('staff/orders', OrderController::class);
    Route::resource('staff/orders/reject', OrderController::class);
    Route::post('staff/orders/reject/{id}', [OrderController::class, 'reject']);
    Route::post('staff/orders/confirm/{id}', [OrderController::class, 'confirm']);

    // Thay đổi profile
    Route::resource('staff/profile', StaffController::class);

});

//cac route danh cho admin
Route::middleware(['web'])->group(function () {
    // Định nghĩa nhóm route cho admin
    Route::prefix('admin')->name('admin.')->group(function () {
        // Route cho trang thống kê 
        Route::get('index', [AdminController::class, 'index'])->name('index');
        
        // Route cho categories
        Route::resource('categories', CategoryController::class);

        // Route cho accounts
        Route::resource('accounts', AccountController::class);

        Route::post('accounts/activate/{id}', [AccountController::class, 'activate'])
            ->name('accounts.activate');
        Route::post('accounts/deactivate/{id}', [AccountController::class, 'deactivate'])
            ->name('accounts.deactivate');        
    });
});