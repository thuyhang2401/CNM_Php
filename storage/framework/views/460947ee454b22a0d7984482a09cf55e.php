
<h2>Confirm Delete</h2>
<p>Are you sure you want to delete the category: <?php echo e($category->category_name); ?>?</p>
<form method="POST" action="<?php echo e(route('admin.categories.confirmDestroy', $category->id)); ?>">
    <?php echo csrf_field(); ?>
    <button name="confirm" value="1" type="submit">Yes, Delete</button>
    <button name="confirm" value="0" type="submit">No, Cancel</button>
</form>
<?php /**PATH D:\Baitap\DoAn_CongNgheMoi\QuanLyHoaCu\resources\views/admin/categories/confirm_delete.blade.php ENDPATH**/ ?>