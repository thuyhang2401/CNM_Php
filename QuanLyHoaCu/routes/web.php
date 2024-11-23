<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
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

    // Thay đổi profile
    //Route::get('/staff/profile', [::class, 'export']);
});
