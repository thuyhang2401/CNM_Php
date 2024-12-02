<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use App\Services\ProductService;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    protected $productService;

    public function __construct(OrderService $orderService, ProductService $productService)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    public function index()
    {
        $data = $this->orderService->getOrders();
        $waitConfirm = $this->orderService->getOrderByStatus('Chờ xác nhận');
        $confirmed = $this->orderService->getOrderByStatus('Đã xác nhận');
        $delivering = $this->orderService->getOrderByStatus('Đang giao');
        $delivered = $this->orderService->getOrderByStatus('Đã giao');
        $rejected = $this->orderService->getOrderByStatus('Đã hủy');

        return view('staff.orders', compact(
            'waitConfirm',
            'confirmed',
            'delivering',
            'delivered',
            'rejected'
        ));
    }

    public function show(string $id)
    {
        $data = $this->orderService->getOrderDetailById($id);
        $products = $this->productService->getProductsByOrderId($id);
        return view('staff.orderDetail', compact('data', 'products'));
    }

    public function reject(string $id)
    {
        try {
            if (!$this->orderService->getOrderById($id)) {
                return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
            }

            $this->orderService->handleOrder($id, 'Đã hủy');

            return redirect()->back()->with('success', 'Đơn hàng đã được hủy.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Hủy đơn hàng không thành công.');
        }

    }

    public function confirm(string $id)
    {
        try {
            if (!$this->orderService->getOrderById($id)) {
                return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
            }

            $this->orderService->handleOrder($id, 'Đã xác nhận');

            return redirect()->back()->with('success', 'Đơn hàng đã được xác nhận.');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Xác nhận đơn hàng không thành công.');
        }

    }

}
