<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staffs';
    protected $primaryKey = 'staff_id';
    public $timestamps = false;
    protected $fillable = [
        'fullname',
        'gender',
        'dob',
        'phone_number',
        'address',
        'avatar',
        'salary',
        'account_id'
    ];
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }
}
