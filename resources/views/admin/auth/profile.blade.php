@extends('admin.layout.layout')

@section('content')



@include('alerts.success-alert')
    @include('alerts.error-alert')

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <form  method="POST" class="form-horizontal" action="{{route('admin.edit.admin')}}">
        @csrf
        <div class="card-body">
          <h4 class="card-title">Personal Info</h4>
          <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="fname" placeholder="Name" value="{{ auth()->guard('admin')->user()->name }}" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ auth()->guard('admin')->user()->email }}" required>
            </div>
          </div>
        </div>
        <div class="border-top">
          <div class="card-body">
            <button type="submit" class="btn btn-primary">
              Edit Personal Info
            </button>
          </div>
        </div>
      </form>
    </div>

  </div>
  <div class="col-md-6">
    <div class="card">
      <form class="form-horizontal" action="{{route('admin.edit.password')}}" method="POST">
        @csrf
        <div class="card-body">
          <h5 class="card-title mb-0">Change Password</h5>
          <div class="form-group mt-3">
            <label>Old Password</label>
            <input type="password" name="old_password" class="form-control date-inputmask" id="date-mask" placeholder="Old Password">
            @error('old_password')
            {{ $message }}
            @enderror
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" class="form-control date-inputmask" id="date-mask" placeholder="New Password">
            @error('password')
            {{ $message }}
            @enderror
          </div>
          <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control date-inputmask" id="date-mask" placeholder="Confirm New Password">
            @error('password_confirmation')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="border-top">
          <div class="card-body">
            <button type="submit" class="btn btn-primary">
              Edit Password
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection