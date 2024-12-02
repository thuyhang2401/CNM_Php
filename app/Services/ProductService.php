<?php
namespace App\Services;

use App\Models\Product;
use DB;

class ProductService
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProductsByOrderId($id)
    {
        return DB::table('orders as o')
            ->join('order_details as odd', 'o.order_id', '=', 'odd.order_id')
            ->join('products as p', 'p.product_id', '=', 'odd.product_id')
            ->select(
                'p.product_name as name',
                'p.image as image',
                'odd.quantity as quantity',
                'p.price as price'
            )
            ->where('o.order_id', $id)
            ->get();
    }

    public function createProduct($product)
    {
        $validatedData = $product->validated();
        if ($product->hasFile('image')) {
            $image = $product->file('image');
            $imageName = basename($image);
            $image->move(public_path('img/'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $this->product->create($validatedData);
    }

    public function updateProduct($product, $id)
    {
        $oldProduct = $this->getProductById($id);
        $validatedData = $product->validated();

        if ($product->hasFile('image')) {
            $image = $product->file('image');
            $imageName = basename($image);
            $image->move(public_path('img/'), $imageName);
            $validatedData['image'] = $imageName;

            if ($product->image && file_exists(public_path('img/' . $product->image))) {
                unlink(public_path('img/' . $product->image));
            }
        }

        $oldProduct->update($validatedData);
    }

    public function deleteProduct($product)
    {
        $product->delete();
    }
    public function getProductById($id)
    {
        return $this->product::find($id);
    }

    public function getAllProducts()
    {
        return $this->product::all();
    }
}
