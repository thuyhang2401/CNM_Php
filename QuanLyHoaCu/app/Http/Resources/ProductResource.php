<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'image' => $this->image,
            'category_name' => $this->category->category_name ?? 'No category'
        ];
    }
}