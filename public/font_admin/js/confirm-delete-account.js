function confirmDelete(accountId) {
    const isConfirmed = confirm("Bạn có chắc chắn muốn xóa tài khoản này không? Hành động này không thể hoàn tác.");
    if (isConfirmed) {
        document.getElementById(`delete-account-form-${accountId}`).submit();
    }
}
