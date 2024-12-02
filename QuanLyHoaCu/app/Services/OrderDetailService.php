<?php

namespace App\Services;

use App\Models\OrderDetail;

class OrderDetailService
{
    protected $orderDetail;

    public function __construct(OrderDetail $orderDetail)
    {
        $this->orderDetail = $orderDetail;
    }

    public function getList($orderId)
    {
        return $this->orderDetail
            ->where('order_id', $orderId)
            ->with('product')
            ->get();
    }

    public function add($orderId, $productId, $quantity)
    {
        return $this->orderDetail
            ->create([
                'order_id' => $orderId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
    }
}