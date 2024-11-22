<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\CartService;

class ShopController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $cartService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService,
        CartService $cartService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->cartService = $cartService;
    }

    private function getDuplicateData()
    {
        return [
            'featuredProducts' => $this->productService->getFeaturedProduct(),
            'categories' => $this->categoryService->getAllCategory(),
            'cartQuantity' => $this->cartService->getCartQuantity(),
        ];
    }

    public function index()
    {
        $getDuplicateData = $this->getDuplicateData();
        $newestProducts = $this->productService->getNewestProduct();
        $bestSellerProducts = $this->productService->getBestSellerProduct();

        return view('index', array_merge($getDuplicateData, [
                'newestProducts' => $newestProducts,
                'bestSellerProducts' => $bestSellerProducts,
            ])
        );
    }

    public function shop()
    {
        $getDuplicateData = $this->getDuplicateData();
        $products = $this->productService->getAllProduct();
        $shopQuantity = $this->productService->getProductQuantity();

        return view('shop', array_merge($getDuplicateData, [
            'products' => $products,
            'shopQuantity' => $shopQuantity,
        ]));
    }

    public function shopDetail()
    {
        $getDuplicateData = $this->getDuplicateData();

        return view('shop-detail', $getDuplicateData);
    }
}
