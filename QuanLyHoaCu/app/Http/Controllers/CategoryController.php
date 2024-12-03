<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị danh sách categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    //tạo mới category
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:100|unique:categories,category_name',
            'description' => 'nullable|max:100',
        ], [
            'category_name.required' => 'Tên danh mục không được để trống!',
            'category_name.unique' => 'Tên danh mục đã tồn tại!',
            'category_name.max' => 'Tên danh mục không vượt quá 100 ký tự!',
            'description.max' => 'Mô tả không vượt quá 100 ký tự!',
        ]);

        Category::create($request->only(['category_name', 'description']));
        return redirect()->route('admin.categories.index')->with('success', 'Tạo mới danh mục thành công!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Cập nhật category
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|max:100',
            'description' => 'nullable|max:100',
        ]);

        $category->update($request->only(['category_name', 'description']));
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    // Xóa category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}