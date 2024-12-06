<h2>Xin chào {{ $account->username }},</h2>

<p>Bạn đã yêu cầu khôi phục mật khẩu cho tài khoản của mình tại <span style="font-size: large; font-weight: bold; color: #81C408;">MasterPaint</span>. Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng bỏ qua email này.</p>

<p>Để đặt lại mật khẩu của bạn, vui lòng nhấp vào liên kết bên dưới:</p>

<p>
    <a href="{{ route('resetPassword', $token) }}" style="display: inline-block; padding: 10px 20px; color: white; background-color: #3490dc; text-decoration: none; border-radius: 5px;">
        Đặt lại mật khẩu
    </a>
</p>

<p>Lưu ý: Liên kết này sẽ hết hạn sau {{ config('auth.passwords.users.expire') }} phút.</p>

<p>Trân trọng,<br>Đội ngũ MasterPaint.</p>