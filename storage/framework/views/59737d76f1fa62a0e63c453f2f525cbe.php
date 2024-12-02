

<?php $__env->startSection('content'); ?>
<h1>Categories</h1>
<a href="<?php echo e(route('admin.categories.create')); ?>">Create New Category</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($category->category_id); ?></td>
            <td><?php echo e($category->category_name); ?></td>
            <td><?php echo e($category->description); ?></td>
            <td>
                <!-- Sửa lại route từ admin.categories.edit sang admin.categories.edit với tham số là category -->
                <a href="<?php echo e(route('admin.categories.edit', $category)); ?>">Edit</a>

                <!-- Sửa lại route từ admin.categories.destroy sang admin.categories.destroy với tham số là category -->
                <form action="<?php echo e(route('admin.categories.destroy', $category)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views\admin\categories\index.blade.php ENDPATH**/ ?>