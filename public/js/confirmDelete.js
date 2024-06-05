function confirmDelete(itemType, itemId, dataTable ) {
  Swal.fire({
    title: 'Are you sure?',
    text: 'You will not be able to recover this ' + itemType + '!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
  }).then((result) => {
    var deleteUrl = $('.delete_' + itemId).data('delete-url');

    if (result.isConfirmed) {
      $.ajax({
        url: deleteUrl,
        type: 'DELETE',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, // Add CSRF token
        success: function(response) {
          // Handle success, e.g., show success message
          Swal.fire('Deleted!', 'Your ' + itemType + ' has been deleted.', 'success');

          // Reload the DataTable
          dataTable.ajax.reload();
        },
        error: function(xhr, status, error) {
          console.error('Error Response:', xhr.responseText);
          // Handle error, e.g., show error message
          Swal.fire('Error!', 'Failed to delete ' + itemType + '.', 'error');
        }
      });
    }
  });
}
