<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $table = 'password_reset_tokens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'token'
    ];

    public function account()
    {
        return $this->hasOne(Account::class, 'email', 'email');
    }
}