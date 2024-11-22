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

    public function getAllCategory()
    {
        return $this->category
            ->withCount('product')
            ->get();
    }
}
