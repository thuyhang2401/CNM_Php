

<?php $__env->startSection('content'); ?>
<h1>Accounts</h1>
<a href="<?php echo e(route('admin.accounts.create')); ?>" class="btn btn-primary">Add Account</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
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
                <a href="<?php echo e(route('admin.accounts.edit', $account->account_id)); ?>" class="btn btn-warning">Edit</a>
                <form action="<?php echo e(route('admin.accounts.destroy', $account->account_id)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <?php if($account->is_active): ?>
                <form action="<?php echo e(route('admin.accounts.deactivate', $account->account_id)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-secondary">Deactivate</button>
                </form>
                <?php else: ?>
                <form action="<?php echo e(route('admin.accounts.activate', $account->account_id)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-success">Activate</button>
                </form>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views\admin\accounts\index.blade.php ENDPATH**/ ?>