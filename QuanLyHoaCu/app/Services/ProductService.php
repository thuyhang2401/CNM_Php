<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductService
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAllProduct()
    {
        return $this->product->with('category')->orderBy('product_id', 'desc')->get();
    }
}
