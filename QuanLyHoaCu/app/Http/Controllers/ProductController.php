<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProduct();

        return view('index', ['products' => $products]);
    }

    public function shop()
    {
        $products = $this->productService->getAllProduct();

        return view('shop', ['products' => $products]);
    }

    public function shopDetail()
    {
        // $products = $this->productService->getAllProduct();

        return view('shop-detail');
    }
}
