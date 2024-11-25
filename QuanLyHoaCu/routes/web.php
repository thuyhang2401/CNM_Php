<?php


use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'success',
        'data' => 'Hello World',
        'code' => 200
    ]);
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
