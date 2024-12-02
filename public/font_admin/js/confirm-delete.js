function confirmDelete(categoryId) {
    const isConfirmed = confirm("Are you sure you want to delete this category? This action cannot be undone.");
    if (isConfirmed) {
        document.getElementById(`delete-category-form-${categoryId}`).submit();
    }
}
