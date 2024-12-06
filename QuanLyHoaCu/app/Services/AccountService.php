<?php

namespace App\Services;

use App\Models\Account;

class AccountService
{
    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    public function getAccountByEmail($email)
    {
        return $this->account->where('email', $email)->first();
    }
}