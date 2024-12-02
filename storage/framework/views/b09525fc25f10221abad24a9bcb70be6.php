

<?php $__env->startSection('content'); ?>
<h1>Create Category</h1>
<form action="<?php echo e(route('admin.categories.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="category_name">Category Name</label>
    <input type="text" name="category_name" id="category_name" required>

    <label for="description">Description</label>
    <input type="text" name="description" id="description">

    <button type="submit">Create Category</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views\admin\categories\create.blade.php ENDPATH**/ ?>