<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products = $this->productService->getAllProducts();
        $categories = $this->categoryService->getAllCategories();
        return View('staff.products', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('staff.createProduct')->with('categories', $categories);
    }

    public function store(ProductRequest $request)
    {
        try {
            $this->productService->createProduct($request);
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm. Vui lòng thử lại.');
        }

    }

    public function show(string $id)
    {
        $product = $this->productService->getProductById($id);
        $categories = $this->categoryService->getAllCategories();

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        return View('staff.updateProduct', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, string $id)
    {
        try {
            $product = $this->productService->getProductById($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
            }

            $this->productService->updateProduct($request, $id);

            return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi cập nhật thông tin sản phẩm. Vui lòng thử lại.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $product = $this->productService->getProductById($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
            }

            $this->productService->deleteProduct($product);

            return redirect()->back()->with('success', 'Sản phẩm đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm. Vui lòng thử lại.');
        }
    }
}
