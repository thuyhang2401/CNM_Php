<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $product = Product::where('category_id', 1)->get();

    return response()->json([
        'message' => 'success',
        'data' => $product,
        'code' => 200
    ]);
});
