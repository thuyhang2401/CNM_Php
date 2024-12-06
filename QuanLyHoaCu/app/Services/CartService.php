<?php

namespace App\Services;

use App\Models\Cart;

class CartService
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getListCart($customerId)
    {
        return $this->cart
            ->where('customer_id', $customerId)
            ->with('product')
            ->get();
    }

    public function getListCartSelected($selectedCartIds, $customerId)
    {
        return $this->cart
            ->where('customer_id', $customerId)
            ->whereIn('product_id', $selectedCartIds)
            ->get();
    }

    public function getCartQuantity($customerId)
    {
        return $this->cart
            ->where('customer_id', $customerId)
            ->count();
    }

    public function updateQuantityInCart($productId, $customerId, $newQuantity)
    {
        return $this->cart
            ->where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->update(['quantity' => $newQuantity]);
    }

    public function addProductToCart($productId, $customerId, $quantity)
    {
        $cartItem = $this->cart
            ->where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $qtt = $cartItem->quantity;
            $newQuantity = $qtt + $quantity;

            return $this->updateQuantityInCart($productId, $customerId, $newQuantity);
        } else {
            return $this->cart
                ->create([
                    'customer_id' => $customerId,
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
        }
    }

    public function deleteProductInCart($productId, $customerId)
    {
        return $this->cart
            ->where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->delete();
    }
}