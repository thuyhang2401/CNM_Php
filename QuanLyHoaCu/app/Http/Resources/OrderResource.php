<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'create_at' => $this->created_at,
            'customer_infor' => [
                'fullname' => $this->customer->full_name,
                'phone_number' => $this->phone_number,
                'shipping_address' => $this->shipping_address
            ],
            'status'=>$this->status
        ];
    }
}
