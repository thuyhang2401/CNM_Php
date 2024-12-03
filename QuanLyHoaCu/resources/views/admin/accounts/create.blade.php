@extends('admin.admin')

@section('content')
<h1 class="mb-4">Tạo tài khoản mới</h1>

<form action="{{ route('admin.accounts.store') }}" method="POST" class="account-form">
    @csrf
    <div class="form-group">
        <label for="username">Tên người dùng: </label>
        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required
            placeholder="Nhập tên người dùng...">
        @error('username')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required
            placeholder="Nhập email...">
        @error('email')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="role_id">Quyền: </label>
        <select name="role_id" class="form-control" required>
            <option value="">Chọn quyền</option>
            <option value="1" {{ old('role_id') == 1 ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>User</option>
        </select>
        @error('role_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu: </label>
        <input type="password" name="password" class="form-control" required placeholder="Nhập mật khẩu...">
        @error('password')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Nhập lại mật khẩu: </label>
        <input type="password" name="password_confirmation" class="form-control" required
            placeholder="Nhập lại mật khẩu...">
    </div>
    <div class="form-group">
        <label for="is_active">Trạng thái: </label>
        <select name="is_active" class="form-control" required>
            <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
    <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary">Hủy bỏ</a>
</form>

<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Arial', sans-serif;
    }

    h1 {
        font-size: 30px;
        font-weight: bold;
        color: black;
        text-align: center;
        margin-bottom: 15px;
        margin-top: 15px;
    }

    .account-form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
        margin-bottom: 200px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 10px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .btn {
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.3s;
        width: 48%;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
    }

    .btn-secondary {
        margin-left: 4%;
    }

    .text-danger {
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 5px;
        margin-bottom: 10px;
    }
</style>
@endsection