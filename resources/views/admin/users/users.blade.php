@extends('admin.layout.layout')

@section('content')

<!-- Bootstrap CSS (optional, if you're using Bootstrap) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<div class="container" style="background: #fff;">

  <div class="col-md-12 form-group">
    @include('alerts.success-alert')
  </div>
  <div class="row justify-content-end">
    <div class="col-12">
      <h2>Users</h2>
    </div>


  </div>



  <div class="card">
    <div class="card-body">
      <div class="table-responsive-lg">
        {!! $dataTable->table(['class' => 'table table-bordered'] ,true) !!}
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ban User Until</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('confirm.ban.user') }}" method="post">
        @csrf
        <div class="modal-body">
          <!-- Dropdown inside the modal -->

          <div class="mb-3">
            <input type="hidden" name="user_id" id="user_id">
            <label for="exampleDropdown" class="form-label">Date</label>
            <input type="date" name="ban_date" class="form-date ban_date" value="" require>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
  $(document).ready(function() {
    // Attach click event to Edit buttons
    $(document).on('click', '.edit', function() {
      var userId = $(this).data('id');

      // Perform AJAX request to get contact details
      $.ajax({
        url: 'http://127.0.0.1:8000/admin/users/' + userId, // Adjust the URL to match your route
        method: 'GET',
        success: function(response) {
          $("#user_id").val(userId)
          console.log(response.bannedUntilDates);

          if (response.bannedUntilDates !== null) {
            $(".ban_date").val(response.bannedUntilDates)
          }else {
            $(".ban_date").val(null)
          }


          $('#exampleModal').modal('show');
        },
        error: function(xhr) {
          console.log(xhr.responseText);
        }
      });
    });
  });
</script>

{!! $dataTable->scripts() !!}

@endsection