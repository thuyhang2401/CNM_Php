

<?php $__env->startSection('content'); ?>
<h1>Account Details</h1>

<table class="table">
    <tr>
        <th>ID</th>
        <td><?php echo e($account->account_id); ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo e($account->username); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo e($account->email); ?></td>
    </tr>
    <tr>
        <th>Role</th>
        <td><?php echo e($account->role_id); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo e($account->is_active ? 'Active' : 'Inactive'); ?></td>
    </tr>
</table>

<a href="<?php echo e(route('admin.accounts.index')); ?>" class="btn btn-secondary">Back to Accounts</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views/admin/accounts/show.blade.php ENDPATH**/ ?>