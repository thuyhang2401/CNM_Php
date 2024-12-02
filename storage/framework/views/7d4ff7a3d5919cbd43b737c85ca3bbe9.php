

<?php $__env->startSection('content'); ?>
<h1 class="mb-4">Tạo tài khoản mới</h1>

<form action="<?php echo e(route('admin.accounts.store')); ?>" method="POST" class="account-form">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="username">Tên người dùng:  </label>
        <input type="text" name="username" class="form-control" value="<?php echo e(old('username')); ?>" required placeholder="Nhập tên người dùng...">
        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger small"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="email">Email:  </label>
        <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required placeholder="Nhập email...">
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger small"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="role_id">Quyền:  </label>
        <select name="role_id" class="form-control" required>
            <option value="">Chọn quyền</option>
            <option value="1" <?php echo e(old('role_id') == 1 ? 'selected' : ''); ?>>Admin</option>
            <option value="2" <?php echo e(old('role_id') == 2 ? 'selected' : ''); ?>>User</option>
        </select>
        <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger small"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" class="form-control" required placeholder="Nhập mật khẩu...">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger small"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Nhập lại mật khẩu</label>
        <input type="password" name="password_confirmation" class="form-control" required placeholder="Nhập lại mật khẩu...">
    </div>
    <div class="form-group">
        <label for="is_active">Trạng thái</label>
        <select name="is_active" class="form-control" required>
            <option value="1" <?php echo e(old('is_active') == 1 ? 'selected' : ''); ?>>Active</option>
            <option value="0" <?php echo e(old('is_active') == 0 ? 'selected' : ''); ?>>Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
    <a href="<?php echo e(route('admin.accounts.index')); ?>" class="btn btn-secondary">Hủy bỏ</a>
</form>

<style>
    body {
        background-color: #f0f2f5; /* Màu nền nhẹ nhàng */
        font-family: 'Arial', sans-serif; /* Font chữ hiện đại */
    }

    h1 {
        font-size: 30px; /* Kích thước tiêu đề */
        font-weight: bold;
        color: black; /* Màu tiêu đề */
        text-align: center; /* Canh giữa tiêu đề */
        margin-bottom: 15px;
        margin-top: 15px; /* Khoảng cách dưới tiêu đề */
    }

    .account-form {
        background-color: #ffffff; /* Màu nền cho form */
        padding: 30px; /* Padding cho form */
        border-radius: 10px; /* Bo góc cho form */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Đổ bóng cho form */
        max-width: 600px; /* Chiều rộng tối đa */
        margin: 0 auto; /* Canh giữa form */
        margin-bottom: 200px;
    }

    .form-group {
        margin-bottom: 20px; /* Khoảng cách giữa các ô */
    }

    .form-control {
        border-radius: 5px; /* Bo góc cho input */
        border: 1px solid #ced4da; /* Màu viền cho input */
        padding: 10px; /* Padding cho input */
        transition: border-color 0.3s; /* Hiệu ứng chuyển đổi cho viền */
    }

    .form-control:focus {
        border-color: #007bff; /* Màu viền khi focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Đổ bóng khi focus */
    }

    .btn {
        padding: 10px 15px; /* Padding cho nút */
        border-radius: 5px; /* Bo góc cho nút */
        font-size: 16px; /* Kích thước chữ trong nút */
        transition: background-color 0.3s, transform 0.3s; /* Hiệu ứng chuyển đổi */
        width: 48%; /* Chiều rộng nút */
    }

    .btn-primary {
        background-color: #007bff; /* Màu nền nút tạo tài khoản */
        color: white; /* Màu chữ */
        border: none; /* Không viền */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Màu nền khi hover */
        transform: translateY(-2px); /* Hiệu ứng nhấc lên khi hover */
    }

    .btn-secondary {
        background-color: #6c757d; /* Màu nền nút hủy */
        color: white; /* Màu chữ */
        border: none; /* Không viền */
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Màu nền khi hover */
        transform: translateY(-2px); /* Hiệu ứng nhấc lên khi hover */
    }

    /* Định dạng cho nút Cancel */
    .btn-secondary {
        margin-left: 4%; /* Khoảng cách giữa các nút */
    }

    .text-danger {
    color: #dc3545; /* Màu đỏ cho thông báo lỗi */
    font-size: 0.875em; /* Kích thước chữ nhỏ hơn (khoảng 14px) */
    margin-top: 5px; /* Khoảng cách trên thông báo lỗi */
    margin-bottom: 10px; /* Khoảng cách dưới thông báo lỗi */
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views/admin/accounts/create.blade.php ENDPATH**/ ?>