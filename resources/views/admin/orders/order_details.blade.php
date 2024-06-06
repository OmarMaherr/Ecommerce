@extends('admin.layout.layout')

@section('content')
<div class="row">
  <div class="col-md-6" data-select2-id="14">
    <div class="card">
      <form class="form-horizontal">
        <div class="card-body">
          <h4 class="card-title">Order Info</h4>
          <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">First Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="fname" placeholder="First Name" value="{{ $order->first_name }}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="lname" placeholder="Last Name" value="{{ $order->last_name }}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Phone Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="lname" placeholder="Phone Number" value="{{ $order->phone_number }}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label for="email1" class="col-sm-3 text-end control-label col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="email1" placeholder="Email" value="{{ $order->email }}" disabled>
            </div>
          </div>

          <div class="form-group row">
            <label for="country1" class="col-sm-3 text-end control-label col-form-label">Country</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="country1" placeholder="Country" value="{{ $order->country }}" disabled>
            </div>
          </div>


          <div class="form-group row">
            <label for="city1" class="col-sm-3 text-end control-label col-form-label">City</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="city1" placeholder="City" value="{{ $order->city }}" disabled>
            </div>
          </div>

            @if(isset($order->discount->discount_percentage))
          <div class="form-group row">
            <label for="total_price1" class="col-sm-3 text-end control-label col-form-label">Discount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Discount" placeholder="Discount" value="{{ $order->discount->discount_percentage }}%" disabled>
            </div>
          </div>
            @endif
          <div class="form-group row">
            <label for="total_price1" class="col-sm-3 text-end control-label col-form-label">Total Price</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="total_price1" placeholder="Total Price" value="$ {{ $order->total_price }}" disabled>
            </div>
          </div>


        </div>

      </form>
    </div>


    <div class="card">
      <form class="form-horizontal">
        <div class="card-body">
          <h4 class="card-title">Order Products</h4>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order->orderProducts as $orderProduct)
              <tr>
                <th scope="row">{{ $orderProduct->product->id }}</th>
                <td>{{ $orderProduct->product->name }}</td>
                <td>{{ $orderProduct->quantity }}</td>
                <td>{{ $orderProduct->quantity * $orderProduct->product->price }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </form>
    </div>
  </div>


  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Order Location</h4>
        <div id="googleMap" style="width:100%;height:400px;"></div>
        <input type="hidden" id="latitude" name="latitude" value="{{ $order->latitude }}" class="form-control" placeholder="latitude" aria-label="latitude" aria-describedby="basic-addon1">
        <input type="hidden" id="longitude" name="longitude" value="{{ $order->longitude }}" class="form-control" placeholder="longitude" aria-label="longitude" aria-describedby="basic-addon1">
      </div>
    </div>

    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Order Status</h4>
          <form action="{{ route('admin_order.change_status') }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <div class="form-group row">
              <label for="city1" class="col-sm-3 text-end control-label col-form-label">Order Status</label>
              <div class="col-sm-9">
                <select class="form-select" id="order_status_id" name="order_status_id">
                  @foreach($order_statuses as $order_status)
                  <option value="{{ $order_status->id }}" @if($order_status->id == $order->orderStatus->id) selected @endif >{{ $order_status->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="border-top">
              <div class="card-body" style="justify-content: center; display: flex;">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
            </div>

            <div class="col-md-12 form-group">
              @include('alerts.success-alert')
            </div>
          </form>

        </div>
    </div>
  </div>
</div>


<script>
  var marker;

  function myMap() {
    var defaultLat = document.getElementById('latitude').value;
    var defaultLng = document.getElementById('longitude').value;

    var mapProp = {
      center: new google.maps.LatLng(defaultLat, defaultLng),
      zoom: 13,
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    marker = new google.maps.Marker({
      position: mapProp.center,
      map: map,
      title: 'Marker Title',
      draggable: false,
      icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
    });

  }
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk&callback=myMap"></script>
@endsection
