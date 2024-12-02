<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->order_id,
            'created_at' => $this->create_at,
            'note' => $this->note,
            'name' => $this->name,
            'shipping_address' => $this->shipping_address,
            'phone_number' => $this->phone_number,
            'payment' => $this->payment,
            'payment_at' => $this->payment_at,
            'status' => $this->status,
            'delivery_fee' => $this->delivery_fee,
            'customer_id' => $this->customerId
        ];
    }
}
