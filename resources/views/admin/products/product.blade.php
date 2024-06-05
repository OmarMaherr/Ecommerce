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
    <div class="col-6">
      <h2>Products</h2>
    </div>
    <div class="col-6 text-md-right" style="padding: 1%;">
      <a href="{{route('product.create')}}" class="btn btn-primary">
        <span class="fs"> Add New Product </span></a>
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

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- 
<script>
  function confirmDelete(productId) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You will not be able to recover this product!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        // If confirmed, submit the form
        document.getElementById('delete-form-' + productId).submit();
      }
    });
  }
</script> -->


{!! $dataTable->scripts() !!}

@endsection