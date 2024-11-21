<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;

class ShopController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $newestProducts = $this->productService->getNewestProduct();
        $featuredProducts = $this->productService->getFeaturedProduct();
        $bestSellerProducts = $this->productService->getBestSellerProduct();
        $categories = $this->categoryService->getAllCategory();

        return view(
            'index',
            [
                'newestProducts' => $newestProducts,
                'featuredProducts' => $featuredProducts,
                'bestSellerProducts' => $bestSellerProducts,
                'categories' => $categories
            ]
        );
    }

    public function shop()
    {
        $products = $this->productService->getAllProduct();
        $featuredProducts = $this->productService->getFeaturedProduct();
        $categories = $this->categoryService->getAllCategory();

        return view('shop', [
            'products' => $products,
            'featuredProducts' => $featuredProducts,
            'categories' => $categories
        ]);
    }

    public function shopDetail()
    {
        $featuredProducts = $this->productService->getFeaturedProduct();
        $categories = $this->categoryService->getAllCategory();

        return view('shop-detail', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories
        ]);
    }
}
