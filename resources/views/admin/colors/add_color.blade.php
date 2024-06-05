@extends('admin.layout.layout')


@section('content')


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Create Color</div>
        <div class="card-body">
          <form action="{{ route('color.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Color Name:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter color name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Color</button>
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