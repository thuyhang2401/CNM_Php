<?php

namespace App\Http\Controllers;

use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function listCart()
    {
        $carts = $this->cartService->getListCart();
        $cartQuantity = $this->cartService->getCartQuantity();

        $subTotal = 0;
        foreach ($carts as $cart) {
            if ($cart->product) {
                $subTotal += $cart->quantity * $cart->product->price;
            }
        }

        return view(
            'cart',
            [
                'carts' => $carts,
                'cartQuantity' => $cartQuantity,
                'subTotal' => $subTotal
            ]
        );
    }
}
