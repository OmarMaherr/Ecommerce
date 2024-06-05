@extends('admin.layout.layout')


@section('content')


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Create Discount Code</div>
        <div class="card-body">
          <form action="{{ route('discount.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Discount Code:</label>
              <input type="text" class="form-control" id="discount_code" name="discount_code" placeholder="Enter Discount Code" required>
            </div>
            <div class="form-group">
              <label for="name">Discount Percentage:</label>
              <input type="number" min="1" max="100" class="form-control" 
              id="discount_percentage" name="discount_percentage" placeholder="Enter Discount Percentage" required>
            </div>
            <div class="form-group">
              <label for="name">Discount Expiry Date:</label>
              <input type="date" class="form-control" id="expiry_date" 
              name="expiry_date" value="{{ date('Y-m-d') }}"  required>
            </div>
            <button type="submit" class="btn btn-primary">Create Discount</button>
            <div class="col-md-12 form-group">
              @include('alerts.error-alert')
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection