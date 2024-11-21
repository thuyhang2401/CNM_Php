<?php


use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
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
