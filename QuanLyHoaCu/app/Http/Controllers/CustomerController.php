<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerProfileRequest;
use App\Http\Requests\CustomerPasswordRequest;
use App\Services\CartService;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    protected $customerService;
    protected $cartService;

    public function __construct(
        CustomerService $customerService,
        CartService $cartService
    ) {
        $this->customerService = $customerService;
        $this->cartService = $cartService;
    }

    private function getDuplicateData()
    {
        return [
            'cartQuantity' => $this->cartService->getCartQuantity()
        ];
    }

    public function showProfile()
    {
        $getDuplicateData = $this->getDuplicateData();
        $profile = $this->customerService->getDataToProfile();

        return view(
            'customer-profile',
            array_merge($getDuplicateData, [
                'profile' => $profile
            ])
        );
    }

    public function showChangePassword()
    {
        $getDuplicateData = $this->getDuplicateData();

        return view(
            'customer-password',
            $getDuplicateData
        );
    }

    public function updateProfile(CustomerProfileRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = $avatar->getClientOriginalName();
            $avatar->move(public_path('img/'), $avatarName);
            $validatedData['avatar'] = $avatarName;

            if ($request->image && file_exists(public_path('img/' . $request->avatar))) {
                unlink(public_path('img/' . $request->avatar));
            }
        }

        $this->customerService->updateProfile($validatedData);
        return redirect()->route('customer.profile');
    }

    public function updatePassword(CustomerPasswordRequest $request)
    {
        $validatedData = $request->validated();

        $this->customerService->updatePassword($validatedData);
        return redirect()->route('customer.password');
    }
}
