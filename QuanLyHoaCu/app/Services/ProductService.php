<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class ProductService
{
    protected $product;
    protected $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function getAllProduct()
    {
        return $this->product
            ->with('category')
            ->orderBy('product_id', 'desc')
            ->paginate(9);
    }

    public function getNewestProduct()
    {
        return $this->product
            ->with('category')
            ->orderBy('product_id', 'desc')
            ->take(8)
            ->get();
    }

    public function getFeaturedProduct()
    {
        return $this->product
            ->with('category')
            ->whereRaw('product_id % 2 = 0')
            ->take(4)
            ->get();
    }

    public function getBestSellerProduct()
    {
        return $this->product
            ->with('category')
            ->whereRaw('product_id % 2 != 0')
            ->take(6)
            ->get();
    }

    public function getProductQuantity()
    {
        return $this->product->count();
    }
}
