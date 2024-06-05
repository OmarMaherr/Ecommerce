@extends('admin.layout.layout')


@section('content')


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Update Color</div>
        <div class="card-body">
          <form action="{{ route('color.update', $color->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Color Name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $color->name }}"  placeholder="Enter color name" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Color</button>
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