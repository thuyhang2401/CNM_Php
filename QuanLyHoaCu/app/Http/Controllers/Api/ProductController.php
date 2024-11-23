<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return View('staff.products', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('staff.createProduct')->with('categories', $categories);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = basename($image);
                $image->move(public_path('staff/assets/images/product'), $imageName);
                $validatedData['image'] = $imageName;
            }

            Product::create($validatedData);
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm. Vui lòng thử lại.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy sản phẩm'
            ], 404);
        }

        return View('staff.updateProduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        try {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    'message' => 'Sản phẩm không tồn tại'
                ], 404);
            }

            $validatedData = $request->validated();


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = basename($image);
                $image->move(public_path('staff/assets/images/product'), $imageName);
                $validatedData['image'] = $imageName;

                if ($product->image && file_exists(public_path('staff/assets/images/products/' . $product->image))) {
                    unlink(public_path('staff/assets/images/products/' . $product->image));
                }
            }

            $product->update($validatedData);
            return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi cập nhật thông tin sản phẩm. Vui lòng thử lại.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Không tìm thấy sản phẩm'
                ], 404);
            }

            $product->delete();
            return redirect()->back()->with('success', 'Sản phẩm đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm. Vui lòng thử lại.');
        }
    }
}
