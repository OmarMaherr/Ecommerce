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
      <h2>Contact</h2>
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
        <h5 class="modal-title" id="exampleModalLabel">Change Contact Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('contact_admin.change_status') }}" method="post">
        @csrf
        <div class="modal-body">
          <!-- Dropdown inside the modal -->

          <div class="mb-3">
            <input type="hidden" name="contact_id" id="contact_id">
            <label for="exampleDropdown" class="form-label">Options</label>
            <select class="form-select" id="exampleDropdown" name="contact_emails_status_id">
            </select>
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
      var contactId = $(this).data('id');

      // Perform AJAX request to get contact details
      $.ajax({
        url: 'http://127.0.0.1:8000/admin/contact_admin/' + contactId, // Adjust the URL to match your route
        method: 'GET',
        success: function(response) {

          var dropdown = $('#exampleDropdown');
          dropdown.empty();
          $("#contact_id").val(contactId)
          $.each(response.options, function(index, option) {
            if (response.contact_emails_status === option.id) {
              dropdown.append('<option value="' + option.id + '" selected>' + option.name + '</option>');
            } else {
              dropdown.append('<option value="' + option.id + '">' + option.name + '</option>');
            }
          });

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
