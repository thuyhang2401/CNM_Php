<?php
namespace App\Services;

use App\Models\Order;
use DB;
class OrderService
{

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getOrderById($id)
    {
        return $this->order->where('order_id', $id)->first();
    }
    public function getOrders()
    {
        return DB::table('orders as o')
            ->join('customers as c', 'o.customer_id', '=', 'c.customer_id')
            ->join('order_details as odd', 'o.order_id', '=', 'odd.order_id')
            ->join('products as p', 'p.product_id', '=', 'odd.product_id')
            ->select(
                'o.order_id as order_id',
                'o.created_at as created_at',
                'o.status as status',
                'c.fullname as customer_name',
                'o.shipping_address as shipping_address',
                'o.phone_number as phone_number',
                'o.delivery_fee as delivery_fee',
                'o.note as note',
                DB::raw('(SUM(p.price * odd.quantity) + o.delivery_fee) as total_price')
            )
            ->groupBy(
                'o.order_id',
                'o.created_at',
                'o.status',
                'c.fullname',
                'o.shipping_address',
                'o.phone_number',
                'o.delivery_fee'
            )
            ->get();
    }
    public function handleOrder($id, $statusUpdated)
    {
        $order = $this->order
            ->where('order_id', $id)
            ->first();
        $order->update(['status' => $statusUpdated]);
    }

    public function getOrderByStatus($status)
    {
        return $this->getOrders()
            ->filter(function ($order) use ($status) {
                return $order->status === $status;
            });
        ;
    }

    public function getOrderDetailById($id)
    {
        return $this->getOrders()
            ->where('order_id', $id)
            ->first();
    }
}
