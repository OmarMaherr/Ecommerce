@extends('layout.layout')


@section('content')


<section class="tracking_box_area section_gap">
  <div class="container">
    <div class="tracking_box_inner">

      @if (session('message'))
      <div class="alert alert-danger">{{ session('message') }}</div>
      @endif

      <h1>Log in</h1>
      <form action="{{route('login')}}" method="POST" class="row tracking_form">
        @csrf
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
          <button type="submit" value="submit" class="btn submit_btn">Log in</button>
        </div>
        <div class="col-md-12 form-group">
          @include('alerts.error-alert')
        </div>
        <div class="col-md-12 form-group">
          <p>Don't have an Account? <a href="{{route('register')}}"> Register Now!</a></p>
        </div>

      </form>
    </div>
  </div>
</section>


@endsection