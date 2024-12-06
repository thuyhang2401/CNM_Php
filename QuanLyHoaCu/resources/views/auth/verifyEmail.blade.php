<h3>Xin chào {{ $account->username }}</h3>

<p>Cảm ơn bạn đã đăng ký tài khoản tại <span style="font-size: large; font-weight: bold; color: #81C408;">MasterPaint</span>. Để hoàn tất quá trình đăng ký, vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào liên kết bên dưới:</p>

<p>
    <a href="{{ route('verifyAccount', $account->email) }}" style="display: inline-block; padding: 10px 20px; color: white; background-color: #3490dc; text-decoration: none; border-radius: 5px;">
        Click vào đây để xác minh email!
    </a>
</p>

<p>Nếu bạn không tạo tài khoản này, vui lòng bỏ qua email này.</p>

<p>Trân trọng,<br>Đội ngũ MasterPaint</p>