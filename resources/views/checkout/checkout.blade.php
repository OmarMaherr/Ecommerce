@extends('layout.layout')


@section('content')
    @php $subtotal=0; @endphp

    <style>
        /* Set the size of the map */
        #googleMap {
            width: 100%;
            height: 400px;
        }

        .nice-select {
            width: 100%;
            text-align: center !important;
        }

        .nice-select.open .list {
            width: 100%;
        }

        .nice-select .option,
        .nice-select .option:hover,
        .nice-select .option.focus,
        .nice-select .option.selected.focus {
            text-align: center;
        }

        .form-v5-content {
            height: auto !important;
        }

        .page-content {
            height: 910px;
        }

        .form-detail .form-row-last input {
            width: 238px !important;
        }

        .invalid_label_asterisk {
            color: red;
            font-weight: bold;
        }


    </style>
    <section class="checkout_area section_gap">
        <div class="container">

            <div class="cupon_area">
                <div class="check_title">
                    <h2>
                        Have a coupon?
                    </h2>
                </div>
                <input type="text" id="coupon" name="coupon" placeholder="Enter coupon code"/>
                <button class="tp_btn" onclick="proccess()">Apply Coupon</button>
            </div>
            <div class="alert  coupon_alert d-none" role="alert">

            </div>

            <form class="row checkout_form" name="checkout_form" action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Billing Details</h3>

                            <input type="hidden" id="discount_id" name="discount_id" class="discount_id"/>

                            <div class="col-md-12 form-group p_star">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                       placeholder="First name" required/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                       placeholder="Last name" required/>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <label for="phone_number">Phone number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                       placeholder="Phone number" required/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Email Address" required/>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label for="city">Country</label>
                                <select class="country_select" name="country" required>
                                    <option value="1">Jordan</option>
                                    <option value="2">Country</option>
                                    <option value="4">Country</option>
                                </select>
                            </div>


                            <div class="col-md-12 form-group p_star">
                                <label for="city">Town/City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Town/City"
                                       required/>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Location</h3>
                                </div>

                                <div id="googleMap" style="width:100%;height:400px;"></div>

                                <input type="hidden" id="latitude" name="latitude" value="{{ $map->latitude }}"
                                       class="form-control" placeholder="latitude" aria-label="latitude"
                                       aria-describedby="basic-addon1">

                                <input type="hidden" id="longitude" name="longitude" value="{{ $map->longitude }}"
                                       class="form-control" placeholder="longitude" aria-label="longitude"
                                       aria-describedby="basic-addon1">

                                <input type="hidden" value="{{ $map->id }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li>
                                        <a>Product
                                            <span>Total</span>
                                        </a>
                                    </li>
                                    @foreach($carts as $cart)

                                        <li>
                                            <a href="{{ route('single_product.show' , [encrypt($cart->product->id)]) }}">{{ $cart->product->name }}
                                                <span class="middle">x {{ $cart->quantity }}</span>
                                                @php $subtotal += $cart->product->price * $cart->quantity; @endphp
                                                <span
                                                    class="last">{{session()->get('current_currency') }} {{ convertPrice($cart->quantity * $cart->product->price)}}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Subtotal
                                            <span
                                                class="subtotal-value">{{session()->get('current_currency') }} {{ convertPrice($subtotal)}}</span>
                                        </a>
                                    </li>
                                    <li class="coupon_applied d-none">
                                        <a href="#" style="color: red;">Discount
                                            <span class="coupon_applied_span" style="color: red;"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Total
                                            <span
                                                class="total-value">{{session()->get('current_currency') }} {{ convertPrice($subtotal)}}</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option5" name="selector"/>
                                        <label for="f-option5">Check payments</label>
                                        <div class="check"></div>
                                    </div>

                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="selector"/>
                                        <label for="f-option6">Paypal </label>
                                        <img src="img/product/single-product/card.jpg" alt=""/>
                                        <div class="check"></div>
                                    </div>

                                </div>
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector"/>
                                    <label for="f-option4">Ive read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <button type="submit" class="main_btn">Proceed to Pay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        // function getLocation() {
        //
        // }
        //
        // function showPosition(position) {
        //     var latitude = position.coords.latitude;
        //     var longitude = position.coords.longitude;
        //     alert("Latitude: " + latitude + "\nLongitude: " + longitude);
        // }


        getLocation();

        var marker;
        var infoWindow; // Variable to hold the info window object

        function myMap() {


            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {

                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    // alert("Latitude: " + latitude + "\nLongitude: " + longitude);

            // var defaultLat = document.getElementById('latitude').value;
            // var defaultLng = document.getElementById('longitude').value;

            var defaultLat = latitude;
            var defaultLng = longitude;

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

            infoWindow = new google.maps.InfoWindow(); // Create an info window

            google.maps.event.addListener(marker, 'dragend', function (event) {
                updateMarker(event.latLng);
            });

            google.maps.event.addListener(map, 'click', function (event) {
                updateMarker(event.latLng);
            });

                });


            } else {
                alert("Geolocation is not supported by this browser.");
            }

        }

        function updateMarker(location) {
            marker.setPosition(location);
            document.getElementById('latitude').value = location.lat();
            document.getElementById('longitude').value = location.lng();

            // Update info window content
            infoWindow.setContent(
                'Latitude: ' + location.lat() + '<br>' +
                'Longitude: ' + location.lng()
            );

            // Open info window above the marker
            infoWindow.open(marker.getMap(), marker);
        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk&callback=myMap"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function proccess() {

            var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var coupon_alert = document.querySelector('.coupon_alert');

            axios.post('/discount_apply', {
                coupon: document.getElementById('coupon').value,
            })
                .then(function (response) {
                    if (response.data.message === 'Coupon Applied Successfully') {
                        if (coupon_alert.classList.contains('alert-danger')) {
                            coupon_alert.classList.remove('alert-danger');
                        }
                        coupon_alert.classList.add('alert-success');

                        document.querySelector('.discount_id').value = response.data.discount_id

                        var subtotalSpan = document.querySelector('.subtotal-value');
                        var old_total = parseFloat(subtotalSpan.textContent.replace('$', ''))
                        var discount_total = (old_total * response.data.discount_percentage) / 100
                        var new_total = old_total - discount_total

                        document.querySelector('.total-value').textContent = "$" + new_total.toFixed(2)

                        document.querySelector('.coupon_applied_span').textContent = "- $" + discount_total.toFixed(2)
                        document.querySelector('.coupon_applied').classList.remove('d-none');
                    } else {
                        if (coupon_alert.classList.contains('alert-success')) {
                            coupon_alert.classList.remove('alert-success');
                        }
                        coupon_alert.classList.add('alert-danger');
                    }

                    coupon_alert.classList.remove('d-none');
                    coupon_alert.textContent = response.data.message;


                    setTimeout(function () {
                        coupon_alert.classList.add('d-none');
                    }, 6000);

                })
                .catch(function (error) {
                    console.log(error);
                });
            ;
        };
    </script>

@endsection
