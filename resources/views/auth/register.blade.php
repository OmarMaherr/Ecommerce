@extends('layout.layout')


@section('content')


<section class="tracking_box_area section_gap">
  <div class="container">
    <div class="tracking_box_inner">
      <h1>Sign Up</h1>
      <form class="row tracking_form" action="{{route('register')}}" method="POST" novalidate="novalidate">
        @csrf
      <div class="col-md-12 form-group">
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
          @error('name')
            {{ $message }}
          @enderror
        </div>
        <div class="col-md-12 form-group">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          @error('email')
            {{ $message }}
          @enderror
        </div>
        <div class="col-md-12 form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          @error('password')
            {{ $message }}
          @enderror
        </div>
        <div class="col-md-12 form-group">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
          @error('password_confirmation')
            {{ $message }}
          @enderror
        </div>

        <div class="col-md-12 form-group">
          <button type="submit" value="submit" class="btn submit_btn">Register Now</button>
        </div>
        <div class="col-md-12 form-group">
          <p>Already have an account <a href="{{route('login')}}">Log in now</a></p>
        </div>
      </form>
    </div>
  </div>
</section>


@endsection