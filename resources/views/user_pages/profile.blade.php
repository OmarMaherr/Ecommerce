@extends('layout.layout')


@section('content')

<style>
    .table td, .table th {
        border: 1px solid #dee2e6 !important;
    }
</style>
<section class="tracking_box_area section_gap">
  <div class="container">
    @include('alerts.success-alert')
    @include('alerts.error-alert')
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="tracking_box_inner">
          <h1>Profile</h1>
          <form action="{{route('edit.user')}}" method="POST" class="row tracking_form">
            @csrf
            <div class="col-md-12 form-group">
              <p style="margin-bottom: 0; color: #71cd14; font-size: 15px;">Name</p>
              <input type="email" class="form-control" placeholder="Name" value="{{auth()->user()->name}}" disabled>
            </div>
            <div class="col-md-12 form-group">
              <p style="margin-bottom: 0; color: #71cd14; font-size: 15px;">Email</p>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{auth()->user()->email}}" required>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="btn submit_btn">Edit Your Profile</button>
            </div>
          </form>

          <form action="{{route('edit.password')}}" method="POST" class="row tracking_form">
            @csrf
            <div class="col-md-12 form-group">
              <p style="margin-bottom: 0; color: #71cd14; font-size: 15px;">Old Password</p>
              <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
              @error('old_password')
              {{ $message }}
              @enderror
            </div>

            <div class="col-md-12 form-group">
              <p style="margin-bottom: 0; color: #71cd14; font-size: 15px;">New Password</p>
              <input type="password" class="form-control" name="password" placeholder="New Password" required>
              @error('password')
              {{ $message }}
              @enderror
            </div>
            <div class="col-md-12 form-group">
              <p style="margin-bottom: 0; color: #71cd14; font-size: 15px;">Confirm New Password</p>
              <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required>
            </div>
            <div class="col-md-12 form-group">
              <button type="submit" value="submit" class="btn submit_btn">Edit Your Password</button>
              @error('password_confirmation')
              {{ $message }}
              @enderror
            </div>

          </form>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <h1>Past Orders</h1>
          <div class="table-responsive">
        <table class="table">
          <thead>
            <th>Order ID</th>
            <th>Date</th>
            <th>Total Price</th>
            <th>Action</th>
          </thead>
          <tbody>
          @foreach($orders as $order)
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->created_at}}</td>
              <td>{{session()->get('current_currency') }} {{ convertPrice($order->total_price)}}</td>
                <td > <span class="badge " style="color: #007bff; background-color: #d3e8ff; border: 1px solid #007bff;">{{$order->orderStatus->name}}</span></td>
            </tr>
          @endforeach
          </tbody>
        </table>
          </div>
      </div>
    </div>
  </div>
</section>


@endsection
