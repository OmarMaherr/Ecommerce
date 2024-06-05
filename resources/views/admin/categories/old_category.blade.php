@extends('admin.layout.layout')

@section('content')

<div class="container" style="background: #fff;">
  <div class="col-md-12 form-group">
    @include('alerts.success-alert')
  </div>
  <div class="row justify-content-end">
    <div class="col-2 justify-content-center" style="padding: 1%;">
      <a href="{{route('add.category')}}" class="btn btn-primary">
        <span class="fs"> Add New Category </span></a>
    </div>
  </div>
  <h2>Categories</h2>

  <table class="table table-bordered table-striped" id="data-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>


@endsection


@section('datatable')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('categories_table') }}",
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'parent_name',
          name: 'parent_name',
          render: function(data, type, row, meta) {
            return row.parent_id === 0 ? 'Main Category' : (row.parent_name ? row.parent_name : 'N/A');
          }
        }, // New column for parent category name
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false,
          render: function(data, type, row, meta) {
            // // Set the edit URL dynamically using data-url attribute
            var editUrl = "{{ route('category.edit', ':id') }}";
            editUrl = editUrl.replace(':id', row.id);

            // Set the delete URL dynamically using data-url attribute
            var deleteUrl = "{{ route('category.destroy', ':id') }}";
            deleteUrl = deleteUrl.replace(':id', row.id);

            return `
            <a href="${editUrl}" class="btn btn-primary btn-sm">Edit</a>
            <button class="btn btn-danger btn-sm delete-category" data-id="${row.id}" onclick="confirmDelete('${deleteUrl}', '${meta.row}')">Delete</button>
        `;

          }
        },
      ]
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function confirmDelete(deleteUrl, rowIndex) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You will not be able to recover this category!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        // If confirmed, make a DELETE request to the delete URL
        $.ajax({
          url: deleteUrl,
          type: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            // If the deletion is successful, remove the row from the table
            $('#data-table').DataTable().row(rowIndex).remove().draw(false);
            // Show success message
            Swal.fire(
              'Deleted!',
              'Category has been deleted.',
              'success'
            );
          }
        });
      }
    });
  }
</script>


<!-- <script>
  function confirmDelete(categoryId, rowIndex) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You will not be able to recover this user!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {

        $('#data-table').DataTable().row(rowIndex).remove().draw(false);
        document.getElementById('delete-form-' + categoryId).submit();

        // Show success message or handle other actions
        Swal.fire('Deleted!', 'Category has been deleted.', 'success');


      }
    });
  }
</script> -->
@endsection