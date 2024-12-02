<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    protected $fillable = [
        'created_at',
        'note',
        'phone_number',
        'shipping_address',
        'payment',
        'status',
        'delivery_fee',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
