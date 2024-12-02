function confirmDelete(categoryId) {
    const isConfirmed = confirm("Bạn có chắc chắn muốn xóa danh mục này không? Hành động này không thể hoàn tác.");
    if (isConfirmed) {
        document.getElementById(`delete-category-form-${categoryId}`).submit();
    }
}
