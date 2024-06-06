<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="img/logo.png" type="image/png"/>
    <title>Eiser ecommerce</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendors/jquery-ui/jquery-ui.css')}}"/>
    <!-- main css -->
    @if(app()->getLocale() == "en")
        <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    @else
        <link rel="stylesheet" href="{{asset('css/ar_style.css')}}"/>
    @endif
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}"/>

</head>

<body>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: 0797638224</p>
                        <p>email: omar@eiser.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">
                            @php
                                $url = url()->full();
                                $pos = strpos($url, app()->getLocale());
                            @endphp
                            <li>
                                {{--                                <a href="{{ substr_replace($url,"en",$pos,2) }}"> English</a>--}}
                                <a href="{{ route('ChangeLang' ,"en") }}"> English</a>
                            </li>

                            <li>
                                {{--                                <a href="{{ substr_replace($url,"ar",$pos,2) }}">العربية</a>--}}
                                <a href="{{ route('ChangeLang' ,"ar") }}">العربية</a>
                            </li>

                            <li>
                                <a href="tracking.html">
                                    track order

                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact.index') }}">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}">
                    <img src="{{asset('img/logo.png')}}" alt=""/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('home.home') }}</a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">{{ __('home.currency') }}</a>
                                    <ul class="dropdown-menu">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('convert_currency' , 'JOD') }}">JOD</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('convert_currency' , 'USD') }}">USD</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('convert_currency' , 'KWD') }}">KWD</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('convert_currency' , 'SAR') }}">SAR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('convert_currency' , 'OMR') }}">OMR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('convert_currency' , 'EUR') }}">EUR</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact.index') }}">{{ __('home.contact') }}</a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <button class="btn btn-success">{{ __('home.log_in') }}</button>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <button class="btn btn-success">{{ __('home.register') }}</button>
                                        </a>
                                    </li>

                                @endguest
                                @auth()
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}">
                                            <button class="btn btn-danger">{{ __('home.log_out') }}</button>
                                        </a>
                                    </li>
                                @endauth

                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">

                                <style>
                                    .icons {
                                        position: relative;
                                    }

                                    .cart-number {
                                        position: absolute;
                                        top: -17px;
                                        right: 13px;
                                        background-color: #71cd14;
                                        color: white;
                                        border-radius: 50% 50% 50% 50%;
                                        padding: 2px;
                                        font-size: 14px;

                                    }
                                </style>
                                <li class="nav-item">
                                    <a href="{{ route('cart.index') }}" class="icons">
                                        <i class="ti-shopping-cart"></i>
                                        @php
                                            $cartCount = cartCount();
                                        @endphp
                                        @if($cartCount > 0)
                                            <span class="cart-number">{{ $cartCount }}</span>
                                        @endif
                                    </a>
                                </li>
                                @auth()
                                    <li class="nav-item">
                                        <a href="{{route('profile')}}" class="icons">
                                            <i class="ti-user" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('wishlist.index')}}" class="icons">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->

<!-- Content -->
@yield('content')
<!--/ Content -->


<!--================ start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 single-footer-widget">

                <h4>Categories</h4>
                <ul>
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('categories.show' , [encrypt($category->id)]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>


        </div>
        <div class="footer-bottom row align-items-center">
            <div class="col-lg-12 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/stellar.js')}}"></script>
<script src="{{asset('vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>



@if(session()->has('success_alert'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire({
            title: "{{session('success_alert')}}",
            text: "",
            icon: "success",
            allowHtml: true
        });
    </script>

    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
@endif




@auth()
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBs6FOaBUhnyytS7HiVS1PsAWJXL5GK-i4",
        authDomain: "ec2024-a1922.firebaseapp.com",
        projectId: "ec2024-a1922",
        storageBucket: "ec2024-a1922.appspot.com",
        messagingSenderId: "280121035997",
        appId: "1:280121035997:web:33625ecccbb41aae1a1f34"

    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    messaging
        .requestPermission()
        .then(function() {
            return messaging.getToken({
                vapidKey: 'BCjdjGHBbRL4e7zKQo2TdPZpGl5oIpP9ab4ME7_zp7JyLJrhOnMXeUVPJNG07jhXE77oUv786_SeM_lmJR5IyJ4'
            })
        })
        .then(function(token) {
            console.log(token);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route("save-push-notification-token") }}',
                type: 'POST',
                data: {
                    token: token
                },
                dataType: 'JSON',
                success: function(response) {
                    // alert('Token saved successfully.');
                },
                error: function(err) {
                    console.log('User Chat Token Error' + err);
                },
            });

        }).catch(function(err) {
        console.log('User Chat Token Error' + err);
    });

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
</script>
@endauth
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
        integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('js/form_validation.js') }}"></script>

</body>

</html>
