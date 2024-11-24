<?php

namespace App\Services;

use App\Models\Cart;

class CartService
{
    protected $cart;

    // get id of customer after login
    protected $customerId = 1;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getListCart()
    {
        return $this->cart
            ->where('customer_id', $this->customerId)
            ->with('product')
            ->get();
    }

    public function getCartQuantity()
    {
        return $this->cart
            ->where('customer_id', $this->customerId)
            ->count();
    }

    public function updateQuantityInCart($productId, $newQuantity)
    {
        return $this->cart
            ->where('customer_id', $this->customerId)
            ->where('product_id', $productId)
            ->update(['quantity' => $newQuantity]);
    }

    public function addProductToCart($productId, $quantity)
    {
        $cartItem = $this->cart
            ->where('customer_id', $this->customerId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $qtt = $cartItem->quantity;
            $newQuantity = $qtt + $quantity;

            return $this->updateQuantityInCart($productId, $newQuantity);
        } else {
            return $this->cart
                ->create([
                    'customer_id' => $this->customerId,
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
        }
    }

    public function deleteProductInCart($productId)
    {
        return $this->cart
            ->where('customer_id', $this->customerId)
            ->where('product_id', $productId)
            ->delete();
    }
}
