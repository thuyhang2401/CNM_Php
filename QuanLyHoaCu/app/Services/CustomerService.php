<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerService
{
    protected $customer;
    protected $account;

    public function __construct(Customer $customer, Account $account)
    {
        $this->customer = $customer;
        $this->account = $account;
    }

    public function getDataToProfile($customerId)
    {
        return $this->customer
            ->with('account')
            ->where('customer_id', $customerId)
            ->first();
    }

    public function getCustomerByAccountId($accountId)
    {
        return $this->customer->where('account_id', $accountId)->first();
    }

    public function updateProfile($data, $customerId)
    {
        $customer = $this->customer->find($customerId);
        if (empty($data['avatar'])) {
            $data['avatar'] = $customer->avatar;
        }

        $customer->update($data);

        return back()->with('success', 'Cập nhật thành công');
    }

    public function updatePassword($data, $customerId)
    {
        $accountId = $this->customer
            ->find($customerId)
            ->account_id;

        $account = $this->account->find($accountId);

        if (!Hash::check($data['current_password'], $account->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu không chính xác.']);
        }

        $account->update(['password' => $data['password']]);

        return back()->with('success', 'Cập nhật thành công');
    }
}
