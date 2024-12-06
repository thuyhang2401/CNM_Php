<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return route('login');
        }

        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Kiểm tra role_id của người dùng có nằm trong danh sách vai trò cho phép
        if (!in_array($user->role_id, $roles)) {
            return abort(403, 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}
