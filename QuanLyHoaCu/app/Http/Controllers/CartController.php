<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

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

    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        $this->cartService->addProductToCart($productId, $quantity);

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $productIds = $request->input('productIds');
        $quantities = $request->input('quantities');

        foreach ($productIds as $productId) {
            $quantity = $quantities[$productId];

            $this->cartService->updateQuantityInCart($productId, $quantity);
        }

        return redirect()->route('cart.list');
    }

    public function deleteCart($productId)
    {
        $this->cartService->deleteProductInCart($productId);

        return response()->json(['redirect' => route('cart.list')]);
    }
}
