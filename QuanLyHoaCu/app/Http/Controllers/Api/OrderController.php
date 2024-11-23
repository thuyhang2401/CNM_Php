<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->select(
                'orders.order_id as order_id',
                'orders.created_at',
                'orders.status',
                'customers.full_name as customer_name',
                'customers.phone_number as phone_number',
                'customers.shipping_address as shipping_address'
            )->get();
        
        //return view('staff.orders')->with('data');
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new OrderResource(Order::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
