function confirmDelete(accountId) {
    const isConfirmed = confirm("Are you sure you want to delete this account? This action cannot be undone.");
    if (isConfirmed) {
        document.getElementById(`delete-account-form-${accountId}`).submit();
    }
}
