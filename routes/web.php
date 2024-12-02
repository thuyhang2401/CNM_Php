<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AccountController;

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




