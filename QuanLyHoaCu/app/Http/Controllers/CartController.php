<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        return view(
            'cart',
            [
                'carts' => $carts,
                'cartQuantity' => $cartQuantity
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

    public function getSelectedProduct(Request $request)
    {
        $selectedCartIds = $request->input('selectedIds');

        if (empty($selectedCartIds)) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một sản phẩm.');
        }

        $selectedCartIds = array_map('intval', explode(',', $selectedCartIds));

        // Lấy các object Cart từ database
        $selectedCarts = $this->cartService->getListCartSelected($selectedCartIds);

        session(['selectedCarts' => $selectedCarts]);

        //return View('checkout', compact('cartQuantity', 'selectedCarts'));
        return redirect()->route('checkout.index');
    }
}