<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\OrderCustomerService;
use App\Services\OrderDetailService;

class OrderCustomerController extends Controller
{
    protected $orderService;
    protected $orderDetailService;
    protected $cartService;

    public function __construct(OrderCustomerService $orderService, OrderDetailService $orderDetailService, CartService $cartService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->cartService = $cartService;
    }

    public function index()
    {
        $customerId = session('customerId');
        $cartQuantity = $this->cartService->getCartQuantity($customerId);

        $data = $this->orderService->getList($customerId);
        $waitConfirm = $this->orderService->getListByStatus($customerId, 'Chờ xác nhận');
        $confirmed = $this->orderService->getListByStatus($customerId, 'Đã xác nhận');
        $delivering = $this->orderService->getListByStatus($customerId, 'Đang giao');
        $delivered = $this->orderService->getListByStatus($customerId, 'Đã giao');
        $rejected = $this->orderService->getListByStatus($customerId, 'Đã hủy');

        return view('orderCustomer', compact(
            'data', 
            'waitConfirm',
            'confirmed',
            'delivering',
            'delivered',
            'rejected',
            'cartQuantity'
        ));
    }

    public function show($orderId)
    {
        $order = $this->orderService->getOrderById($orderId);
        $products = $this->orderDetailService->getList($orderId);
        $cartQuantity = $this->cartService->getCartQuantity(session('customerId'));
        $total_money = 0;

        foreach ($products as $product) {
            $total_money += $product->quantity * $product->product->price;
        }

        return view('orderdetail', compact('order', 'products', 'cartQuantity', 'total_money'));
    }

    public function rejectOrder($orderId) {
        $this->orderService->cancelOrder($orderId);

        return response()->json(['redirect' => route('orders.index')]);
    }
}