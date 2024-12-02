

<?php $__env->startSection('content'); ?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding-top: 80px;
        background-color: #f9f9f9;
    }

    .create-category-container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .create-category-container h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333333;
    }

    .create-category-container label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #555555;
    }

    .create-category-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .create-category-container input:focus {
        border-color: #007bff;
        outline: none;
    }

    .create-category-container button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .create-category-container button:hover {
        background-color: #0056b3;
    }
</style>

<div class="create-category-container">
    <h1>Create Category</h1>
    <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label for="category_name">Category Name</label>
        <input type="text" name="category_name" id="category_name" value="<?php echo e(old('category_name')); ?>" required>
        <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div style="color: red; margin-bottom: 10px;"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?php echo e(old('description')); ?>">
        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div style="color: red; margin-bottom: 10px;"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <button type="submit">Create Category</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>