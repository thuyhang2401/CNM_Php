

<?php $__env->startSection('content'); ?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding-top: 80px;
        background-color: #f9f9f9;
    }

    .edit-category-container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .edit-category-container h1 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333333;
    }

    .edit-category-container label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #555555;
    }

    .edit-category-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 16px;
    }

    .edit-category-container input:focus {
        border-color: #007bff;
        outline: none;
    }

    .edit-category-container button {
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

    .edit-category-container button:hover {
        background-color: #0056b3;
    }
</style>

<div class="edit-category-container">
    <h1>Sửa thông tin dnah mục</h1>
    <form action="<?php echo e(route('admin.categories.update', $category->category_id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="category_name">Tên danh mục: </label>
        <input type="text" name="category_name" id="category_name" value="<?php echo e($category->category_name); ?>" required>

        <label for="description">Mô tả: </label>
        <input type="text" name="description" id="description" value="<?php echo e($category->description); ?>">

        <button type="submit">Cập nhật danh mục</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>