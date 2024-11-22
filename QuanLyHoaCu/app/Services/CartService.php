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

    public function getListCart()
    {
        return $this->cart
            ->where('customer_id', 1)
            ->with('product')
            ->get();
    }

    public function getCartQuantity()
    {
        return $this->cart
            ->where('customer_id', 1)
            ->count();
    }
}
