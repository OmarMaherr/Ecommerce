@extends('layout.layout')


@section('content')

<section class="section_gap">
<div class="col-md-12 form-group">
          @include('alerts.success-alert')
        </div>
  <div class="container">
    <!-- <div class="d-none d-sm-block mb-5 pb-4">
      <div id="map" style="height: 480px;"></div>
      <script>
        function initMap() {
          var uluru = {
            lat: -25.363,
            lng: 131.044
          };
          var grayStyles = [{
              featureType: "all",
              stylers: [{
                  saturation: -90
                },
                {
                  lightness: 50
                }
              ]
            },
            {
              elementType: 'labels.text.fill',
              stylers: [{
                color: '#A3A3A3'
              }]
            }
          ];
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: 31.928348424566426,
              lng: 35.93556197959526
            },
            zoom: 9,
            styles: grayStyles,
            scrollwheel: false
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk&callback=initMap"></script>

    </div> -->


    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Get in Touch</h2>
      </div>
      <div class="col-lg-8 mb-4 mb-lg-0">
        <form class="form-contact contact_form" action="{{ route('send') }}" method="post" id="contactForm" novalidate="novalidate">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address" required>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Enter Message" required></textarea>
              </div>
            </div>
          </div>
          <div class="form-group mt-lg-3">
            <button type="submit" type="submit" class="main_btn">Send Message</button>
          </div>
        </form>


      </div>

      <div class="col-lg-4">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>Buttonwood, California.</h3>
            <p>Rosemead, CA 91770</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
          <div class="media-body">
            <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
            <p>Mon to Fri 9am to 6pm</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
            <p>Send us your query anytime!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection