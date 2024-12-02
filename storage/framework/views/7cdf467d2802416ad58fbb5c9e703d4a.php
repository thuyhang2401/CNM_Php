

<?php $__env->startSection('content'); ?>
<h1 class="mb-4">Sửa thông tin tài khoản</h1>

<form action="<?php echo e(route('admin.accounts.update', $account->account_id)); ?>" method="POST" class="account-form">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-group">
        <label for="username">Tên người dùng: </label>
        <input type="text" name="username" class="form-control" value="<?php echo e(old('username', $account->username)); ?>"
            required placeholder="Enter username">
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
        <label for="email">Email: </label>
        <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $account->email)); ?>" required
            placeholder="Enter email">
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
        <label for="role_id">Quyền: </label>
        <select name="role_id" class="form-control" required>
            <option value="">Chọn quyền</option>
            <option value="1" <?php echo e(old('role_id', $account->role_id) == 1 ? 'selected' : ''); ?>>Admin</option>
            <option value="2" <?php echo e(old('role_id', $account->role_id) == 2 ? 'selected' : ''); ?>>User</option>
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
        <label for="is_active">Trạng thái: </label>
        <select name="is_active" class="form-control" required>
            <option value="1" <?php echo e(old('is_active', $account->is_active) ? 'selected' : ''); ?>>Active</option>
            <option value="0" <?php echo e(old('is_active', !$account->is_active) ? 'selected' : ''); ?>>Inactive</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Mật khẩu mới: </label>
        <div class="input-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Click icon bên để đổi mật khẩu"
                readonly>
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    <i class="mdi mdi-eye-off"></i>
                </button>
            </div>
        </div>
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

    <div class="form-group" id="confirmationGroup" style="display: none;">
        <label for="password_confirmation">Xác nhận lại mật khẩu: </label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận lại mật khẩu">
    </div>

    <button type="submit" class="btn btn-warning">Cập nhật tài khoản</button>
    <a href="<?php echo e(route('admin.accounts.index')); ?>" class="btn btn-secondary">Hủy bỏ</a>
</form>

<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Arial', sans-serif;
    }

    h1 {
        font-size: 32px;
        font-weight: bold;
        color: black;
        text-align: center;
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .account-form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
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

    .input-group {
        display: flex;
        align-items: center;
        /* Đảm bảo căn giữa */
    }

    .btn {
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.3s;
        width: 48%;
    }

    .btn-warning {
        background-color: #ffc107;
        color: white;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
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

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const confirmationGroup = document.getElementById('confirmationGroup');

        if (passwordInput.readOnly) {
            passwordInput.readOnly = false;
            confirmationGroup.style.display = 'block';
            this.innerHTML = '<i class="mdi mdi-eye"></i>';
        } else {
            passwordInput.readOnly = true;
            confirmationGroup.style.display = 'none';
            this.innerHTML = '<i class="mdi mdi-eye-off"></i>';
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views/admin/accounts/edit.blade.php ENDPATH**/ ?>