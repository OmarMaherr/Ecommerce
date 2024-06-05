@extends('admin.layout.layout')

@section('content')
<style>
  /* Set the size of the map */
  #googleMap {
    width: 100%;
    height: 400px;
  }

  /* Style the container with white background */
  .container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
</style>


<div class="container">
  <h4>Set Default Location</h4>

 
  <div id="googleMap" style="width:100%;height:400px;"></div>

  <form action="{{ route('map.update' , [ $map->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="input-group mb-3 mt-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">latitude</span>
      </div>
      <input type="text" id="latitude" name="latitude" value="{{ $map->latitude }}"
       class="form-control" placeholder="latitude" aria-label="latitude" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">longitude</span>
      </div>
      <input type="text" id="longitude" name="longitude" value="{{ $map->longitude }}" class="form-control" 
      placeholder="longitude" aria-label="longitude" aria-describedby="basic-addon1" required>
    </div>

    <input type="hidden" name="id" value="{{ $map->id }}">
    <button class="btn btn-danger" type="submit">Save</button>
  </form>

</div>
<script>
  // Global variable to hold the marker object
  var marker;

  function myMap() {
    var defaultLat = document.getElementById('latitude').value;
    var defaultLng = document.getElementById('longitude').value;

    var mapProp = {
      center: new google.maps.LatLng(defaultLat, defaultLng),
      zoom: 10,
    };

    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    marker = new google.maps.Marker({
      position: mapProp.center,
      map: map,
      title: 'Marker Title',
      draggable: true,
      icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png' 
    });

    // document.getElementById('latitude').value = defaultLat;
    // document.getElementById('longitude').value = defaultLng;

    google.maps.event.addListener(marker, 'dragend', function(event) {
      document.getElementById('latitude').value = event.latLng.lat();
      document.getElementById('longitude').value = event.latLng.lng();
    });

    google.maps.event.addListener(map, 'click', function(event) {

      marker.setPosition(event.latLng);

      document.getElementById('latitude').value = event.latLng.lat();
      document.getElementById('longitude').value = event.latLng.lng();
    });
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk&callback=myMap"></script>



<!-- <div class="container">
  <h1>Google Map</h1>
  <div id="map-container">
  </div>
</div>


<script>
  function loadMap() {
    var mapContainer = document.getElementById('map-container');
    var iframe = document.createElement('iframe');
    iframe.width = '100%';
    iframe.height = '100%';
    iframe.frameborder = '0';
    iframe.style.border = '0';
    iframe.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk&callback=myMap';
    
    
    iframe.allowfullscreen = true;
    mapContainer.appendChild(iframe);
  }

  window.onload = loadMap;
</script> -->

@endsection