<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;
    protected $fillable = [
        'fullname',
        'gender',
        'dob',
        'phone_number',
        'address',
        'avatar',
        'account_id'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
