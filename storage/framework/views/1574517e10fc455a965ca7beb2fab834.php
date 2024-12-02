

<?php $__env->startSection('content'); ?>
<h1>Edit Category</h1>
<form action="<?php echo e(route('admin.categories.edit', $category->category_id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label for="category_name">Category Name</label>
    <input type="text" name="category_name" id="category_name" value="<?php echo e($category->category_name); ?>" required>

    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="<?php echo e($category->description); ?>">

    <button type="submit">Update Category</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views\admin\categories\edit.blade.php ENDPATH**/ ?>