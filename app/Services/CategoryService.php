<?php
namespace App\Services;

use App\Models\Category;

class CategoryService
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    function getAllCategories()
    {
        return $this->category::all();
    }
}