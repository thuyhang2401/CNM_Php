<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    protected $table = 'accounts';
    protected $primaryKey = 'account_id';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'email',
        'email_verified_at',
        'is_active',
        'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
