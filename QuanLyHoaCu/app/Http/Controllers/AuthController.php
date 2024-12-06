<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\ResetPassword;
use App\Mail\VerifyAccount;
use App\Models\Account;
use App\Models\Customer;
use App\Models\PasswordResetToken;
use App\Services\AccountService;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    protected $accountService;
    protected $customerService;

    public function __construct(AccountService $accountService, CustomerService $customerService)
    {
        $this->accountService = $accountService;
        $this->customerService = $customerService;
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $account = $this->accountService->getAccountByEmail($request->input('email'));

            if ($account->email_verified_at == null) {
                return redirect()->back()->with('error', 'Vui lòng xác thực email!');
            }

            if ($account->role_id == 1) {
                return redirect()->route('admin.index');
            }
            
            if ($account->role_id == 2) {
                return redirect()->route('products.index')->with('success', 'Đăng nhập thành công!');
            }

            $customer = $this->customerService->getCustomerByAccountId($account->account_id);
            session(['customerId' => $customer->customer_id]);

            return redirect()->route('product.index')->with('success', 'Đăng nhập thành công!');
        }
        return redirect()->back()->with('error', 'Thông tin đăng nhập không đúng!');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $account = Account::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'is_active' => 1,
                'role_id' => 3,
            ]);

            Customer::create([
                'fullname' => $request->input('username'),
                'gender' => $request->input('gender'),
                'dob' => $request->input('dob'),
                'account_id' => $account->account_id
            ]);

            if ($account != null) {
                Mail::to($account->email)->send(new VerifyAccount($account));
                
                return redirect()->route('login')->with('success', 'Đăng ký thành công, vui lòng kiểm tra email của bạn để xác nhận tài khoản!');
            }

            return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        }
    }

    public function verifyAccount($email)
    {
        $acc = Account::where('email', $email)->whereNULL('email_verified_at')->firstOrFail();

        $acc->update(['email_verified_at' => now()]);

        return redirect()->route('login')->with('success', 'Xác minh email thành công!');
    }

    public function forgetView()
    {
        return view('auth.sendMailReset');
    }

    public function forgetPassword(Request $request)
    {
        $request->validate(['email' => 'required|exists:accounts']);

        $account = Account::where('email', $request->input('email'))->first();

        $token = \Str::random(50);
        $tokenData = ['email' => $request->input('email'), 'token' => $token];

        if (PasswordResetToken::create($tokenData)) {
            Mail::to($request->input('email'))->send(new ResetPassword($account, $token));
            return redirect()->back()->with('success', 'Gửi mail thành công. Vui lòng kiểm tra hộp thư của bạn!');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    }

    public function resetView($token)
    {
        $token = $token;

        return view('auth.resetPassword', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'passwordConfirm' => 'required|same:password'
        ]);

        $tokenData = PasswordResetToken::where('token', $request->input('token'))->firstOrFail();
        $account = $tokenData->account;

        $data = ['password' => $request->input('password')];
        $accUpdate = $account->update($data);
        
        if ($accUpdate) {
            return redirect()->route('login')->with('success', 'Đổi mật khẩu thành công');
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    }

    public function logout()
    {
        session()->forget('customerId');
        Auth::logout();
        return redirect()->route('login');
    }
}
