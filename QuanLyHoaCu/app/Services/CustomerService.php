<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    protected $customer;
    protected $account;

    // get id of customer after login
    protected $customerId = 1;

    public function __construct(Customer $customer, Account $account)
    {
        $this->customer = $customer;
        $this->account = $account;
    }

    public function getDataToProfile()
    {
        return $this->customer
            ->with('account')
            ->where('customer_id', $this->customerId)
            ->first();
    }

    public function updateProfile($data)
    {
        $customer = $this->customer->find($this->customerId);
        if (empty($data['avatar'])) {
            $data['avatar'] = $customer->avatar;
        }

        $customer->update($data);

        return back()->with('success', 'Cập nhật thành công');
    }

    public function updatePassword($data)
    {
        $accountId = $this->customer
            ->find($this->customerId)
            ->account_id;

        $account = $this->account->find($accountId);

        if (!Hash::check($data['current_password'], $account->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu không chính xác.']);
        }

        $account->update(['password' => $data['password']]);

        return back()->with('success', 'Cập nhật thành công');
    }
}
