<?php

namespace App\Services;

use App\Models\Order;
use Exception;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\DB;

class OrderCustomerService
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getList($customerId)
    {
        return DB::table('orders as o')
            ->join('order_details as odd', 'o.order_id', '=', 'odd.order_id')
            ->join('products as p', 'p.product_id', '=', 'odd.product_id')
            ->select(
                'o.order_id as order_id',
                'o.created_at as created_at',
                'o.status as status',
                'o.name as name',
                'o.shipping_address as shipping_address',
                'o.phone_number as phone_number',
                DB::raw('(SUM(p.price * odd.quantity) + o.delivery_fee) as total_price')
            )
            ->groupBy(
                'o.order_id',
                'o.created_at',
                'o.status',
                'o.name',
                'o.shipping_address',
                'o.phone_number',
                'o.delivery_fee'
            )
            ->where('customer_id', $customerId)
            ->orderBy('order_id','desc')
            ->get();
    }

    public function getListByStatus($customerId, $status)
    {
        return DB::table('orders as o')
            ->join('order_details as odd', 'o.order_id', '=', 'odd.order_id')
            ->join('products as p', 'p.product_id', '=', 'odd.product_id')
            ->select(
                'o.order_id as order_id',
                'o.created_at as created_at',
                'o.status as status',
                'o.name as name',
                'o.shipping_address as shipping_address',
                'o.phone_number as phone_number',
                DB::raw('(SUM(p.price * odd.quantity) + o.delivery_fee) as total_price')
            )
            ->groupBy(
                'o.order_id',
                'o.created_at',
                'o.status',
                'o.name',
                'o.shipping_address',
                'o.phone_number',
                'o.delivery_fee'
            )
            ->where('customer_id', $customerId)
            ->where('status', $status)
            ->orderBy('order_id','desc')
            ->get();
    }

    public function getOrderById($orderId)
    {
        return $this->order->where('order_id', $orderId)->first();
    }

    public function add($name, $shipping_address, $phone_number, $note, $payment, $customerId)
    {
        $data = array();

        $data['created_at'] = now();
        $data['note'] = $note;
        $data['name'] = $name;
        $data['shipping_address'] = $shipping_address;
        $data['phone_number'] = $phone_number;
        $data['payment'] = $payment;
        $data['payment_at'] = null;
        $data['status'] = 'Chờ xác nhận';
        $data['delivery_fee'] = 30000;
        $data['customer_id'] = $customerId;
        
        return $this->order->create($data);
    }

    public function cancelOrder($orderId)
    {
        return $this->order
            ->where('order_id', $orderId)
            ->update(['status' => 'Đã hủy']);
    }

    public function updatePaymenttimeOrder($orderId, $time)
    {
        return $this->order
            ->where('order_id', $orderId)
            ->update(['payment_at' => $time]);
    }
}