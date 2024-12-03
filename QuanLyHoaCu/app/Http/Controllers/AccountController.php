<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $query = Account::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('username', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $accounts = $query->get();

        return view('admin.accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('admin.accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:accounts|max:255',
            'password' => 'required|min:6|confirmed', // Thêm xác nhận mật khẩu
            'email' => 'required|email|unique:accounts',
            'role_id' => 'required|exists:roles,role_id',
        ], [
            'username.required' => 'Tên đăng nhập là bắt buộc!',
            'username.unique' => 'Tên đăng nhập này đã được sử dụng!',
            'password.required' => 'Mật khẩu là bắt buộc!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password.confirmed' => 'Mật khẩu không khớp!',
            'email.required' => 'Email là bắt buộc!',
            'email.email' => 'Vui lòng nhập địa chỉ email hợp lệ!',
            'email.unique' => 'Email này đã được sử dụng!',
            'role_id.required' => 'Vai trò của tài khoản là bắt buộc!',
            'role_id.exists' => 'Vai trò cảu tài khoản đã chọn không hợp lệ!',
        ]);

        try {
            Account::create($request->all());
            return redirect()->route('admin.accounts.index')->with('success', 'Tài khoản đã được tạo thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi khi tạo tài khoản.'])->withInput();
        }
    }

    public function show(Account $account)
    {
        return view('admin.accounts.show', compact('account'));
    }

    public function edit(Account $account)
    {
        return view('admin.accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account)
    {
        $request->validate([
            'username' => 'required|max:255|unique:accounts,username,' . $account->account_id . ',account_id',
            'email' => 'required|email|unique:accounts,email,' . $account->account_id . ',account_id',
            'role_id' => 'required|exists:roles,role_id',
            'password' => 'nullable|min:6|confirmed',
        ], [
            'username.required' => 'Tên đăng nhập là bắt buộc!',
            'username.unique' => 'Tên đăng nhập này đã được sử dụng!',
            'email.required' => 'Email là bắt buộc!',
            'email.email' => 'Vui lòng nhập địa chỉ email hợp lệ!',
            'email.unique' => 'Email này đã được sử dụng!',
            'role_id.required' => 'Vai trò của tài khoản là bắt buộc!',
            'role_id.exists' => 'Vai trò của tài khoản đã chọn không hợp lệ!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp!',
        ]);

        try {
            // Lấy tất cả dữ liệu từ request
            $data = $request->all();

            // Chỉ cập nhật mật khẩu nếu người dùng nhập mật khẩu mới
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password); // Mã hóa mật khẩu mới
            } else {
                // Nếu không thay đổi mật khẩu, giữ nguyên giá trị mật khẩu cũ
                unset($data['password']);  // Đảm bảo mật khẩu cũ không bị thay đổi
            }

            // Cập nhật tài khoản với dữ liệu đã thay đổi
            $account->update($data);

            return redirect()->route('admin.accounts.index')->with('success', 'Tài khoản đã được cập nhật thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi khi cập nhật tài khoản!'])->withInput();
        }

    }

    public function destroy(Account $account)
    {
        try {
            $account->delete();
            return redirect()->route('admin.accounts.index')->with('success', 'Tài khoản đã được xóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi khi xóa tài khoản!']);
        }
    }

    public function activate($id)
    {
        $account = Account::findOrFail($id);
        $account->is_active = 1;

        try {
            $account->save();
            return redirect()->route('admin.accounts.index')->with('success', 'Tài khoản đã được kích hoạt thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi khi kích hoạt tài khoản!']);
        }
    }

    public function deactivate($id)
    {
        $account = Account::findOrFail($id);
        $account->is_active = 0;

        try {
            $account->save();
            return redirect()->route('admin.accounts.index')->with('success', 'Tài khoản đã được vô hiệu hóa thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Đã xảy ra lỗi khi vô hiệu hóa tài khoản!']);
        }
    }
}