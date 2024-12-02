

<?php $__env->startSection('content'); ?>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
            <li>Quản trị viên</li>
            <li>Quản lý tài khoản</li>
        </ul>
    </div>
</section>

<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Quản lý tài khoản
        </h1>
    </div>
</section>
<!-- Tìm kiếm -->
<div class="mb-4">
    <form action="<?php echo e(route('admin.accounts.index')); ?>" method="GET" class="form-inline">
        <div class="input-group" style="width: 300px;">
            <input type="text" name="search" placeholder="Search accounts by name..." class="form-control"
                style="border-radius: 0.25rem; border: 1px solid #ced4da; padding-left:8px;">
            <div class="input-group-append">
                <button type="submit" class="btn"
                    style="background-color: #6c757d; 
            color: white; border-radius: 0 0.25rem 0.25rem 0; padding: 0px 11px; font-size: 13px; transition: background-color 0.3s;">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>

<a href="<?php echo e(route('admin.accounts.create')); ?>" class="btn btn-primary mb-4" style="background-color: #28a745; border-color: #28a745; padding: 8px 15px; border-radius: 5px; 
font-size: 16px; color: white; margin-left:50px; transition: background-color 0.3s;">Add Account</a>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($account->account_id); ?></td>
                <td><?php echo e($account->username); ?></td>
                <td><?php echo e($account->email); ?></td>
                <td><?php echo e($account->role_id); ?></td>
                <td><?php echo e($account->is_active ? 'Active' : 'Inactive'); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.accounts.edit', $account->account_id)); ?>" class="btn btn-warning btn-sm"
                        style="text-decoration: underline; color: blue;">Sửa</a>
                        <form id="delete-account-form-<?php echo e($account->account_id); ?>" action="<?php echo e(route('admin.accounts.destroy', $account->account_id)); ?>" method="POST" 
                        style="display:inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" onclick="confirmDelete(<?php echo e($account->account_id); ?>)" class="delete-button">Xóa</button>
                    </form>
                    <?php if($account->is_active): ?>
                        <form action="<?php echo e(route('admin.accounts.deactivate', $account->account_id)); ?>" method="POST"
                            style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-secondary btn-sm" style="color: blue;">Vô hiệu</button>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('admin.accounts.activate', $account->account_id)); ?>" method="POST"
                            style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-success btn-sm" style="color: blue;">Kích hoạt</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<style>
    body {
        background-color: #f8f9fa;
    }

    .table {
        width: 90%;
        margin-right: 20px;
        margin-top: 20px;
        margin-left: 50px;
        margin-bottom: 100px;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table th,
    .table td {
        padding: 12px 15px;
    }

    .table th {
        background-color: #007bff;
        color: white;
        text-align: left;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f1f3f5;
    }

    .table-hover tbody tr:hover {
        background-color: #e9ecef;
    }

    .btn {
        margin-right: 5px;
    }

    .mb-3,
    .mb-4 {
        margin-bottom: 1rem;
        margin-left: 50px;
    }

    .form-inline .input-group {
        display: flex;
        align-items: center;
    }

    .form-inline input[type="text"] {
        border-radius: 0.25rem 0 0 0.25rem;
    }

    .form-inline button {
        padding: 0.5rem 1rem;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
    }

    .delete-button {
        border: none;
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 10px;
    }

    .delete-button:hover {
        background-color: #c82333;
    }
</style>
<script src="<?php echo e(asset('font_admin/js/confirm-delete-account.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views/admin/accounts/index.blade.php ENDPATH**/ ?>