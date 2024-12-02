<?php

namespace App\Http\Controllers;

use App\Services\ShopService;
use App\Services\CategoryService;
use App\Services\CartService;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $shopService;
    protected $categoryService;
    protected $cartService;

    public function __construct(
        ShopService $shopService,
        CategoryService $categoryService,
        CartService $cartService
    ) {
        $this->shopService = $shopService;
        $this->categoryService = $categoryService;
        $this->cartService = $cartService;
    }

    private function getDuplicateData()
    {
        return [
            'featuredProducts' => $this->shopService->getFeaturedProduct(),
            'categories' => $this->categoryService->getCategoryWithProduct(),
            'cartQuantity' => $this->cartService->getCartQuantity(),
        ];
    }

    public function index()
    {
        $getDuplicateData = $this->getDuplicateData();
        $newestProducts = $this->shopService->getNewestProduct();
        $bestSellerProducts = $this->shopService->getBestSellerProduct();

        return view(
            'index',
            array_merge($getDuplicateData, [
                'newestProducts' => $newestProducts,
                'bestSellerProducts' => $bestSellerProducts,
            ])
        );
    }

    public function shop(Request $request)
    {

        $getDuplicateData = $this->getDuplicateData();
        $shopQuantity = $this->shopService->getProductQuantity();

        $keyword = $request->input('searchString');
        $products = $this->shopService->getAllProduct($keyword);

        $productsByCategory = [];
        foreach ($getDuplicateData['categories'] as $category) {
            $productsByCategory[$category->category_id] = $this->shopService->getProductsByCategory($category->category_id);
        }

        return view('shop', array_merge($getDuplicateData, [
            'products' => $products,
            'shopQuantity' => $shopQuantity,
            'productsByCategory' => $productsByCategory,
        ]));
    }

    public function shopDetail($productId)
    {
        $getDuplicateData = $this->getDuplicateData();
        $product = $this->shopService->getProductById($productId);
        $products = $this->shopService->getRelatedProduct($productId);

        return view('shop-detail', array_merge($getDuplicateData, [
            'product' => $product,
            'products' => $products,
        ]));
    }
}
