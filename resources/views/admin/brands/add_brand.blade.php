@extends('admin.layout.layout')


@section('content')


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Create Brand</div>
        <div class="card-body">
          <form action="{{ route('brand.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Brand Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter brand name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Brand</button>
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