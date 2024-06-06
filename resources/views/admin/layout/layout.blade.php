<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}" />
  <!-- Custom CSS -->
  <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="{{asset('dist/css/style.min.css') }}" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">





</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="{{route('admin')}}">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="{{asset('assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" width="25" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2">
              <!-- dark Logo text -->
              <img src="{{ asset('assets/images/logo-text.png') }}" alt="homepage" class="light-logo" />
            </span>
            <!-- Logo icon -->
            <!-- <b class="logo-icon"> -->
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

            <!-- </b> -->
            <!--End Logo icon -->
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>
            <!-- ============================================================== -->
            <!-- create new -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box">
              <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify fs-4"></i></a>
              <form class="app-search position-absolute">
                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
              </form>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- Comment -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell font-24"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- End Comment -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            @auth('admin')
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}"><button class="btn btn-danger">Log Out</button></a>
                  </li>
                  @endauth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="font-24 mdi mdi-comment-processing"></i>
              </a>
              <ul class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    animated
                    bounceInDown
                  " aria-labelledby="2">
                <ul class="list-style-none">
                  <li>
                    <div class="">
                      <!-- Message -->
                      <a href="javascript:void(0)" class="link border-top">
                        <div class="d-flex no-block align-items-center p-10">
                          <span class="
                                btn btn-success btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-calendar text-white fs-4"></i></span>
                          <div class="ms-2">
                            <h5 class="mb-0">Event today</h5>
                            <span class="mail-desc">Just a reminder that event</span>
                          </div>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="link border-top">
                        <div class="d-flex no-block align-items-center p-10">
                          <span class="
                                btn btn-info btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-settings fs-4"></i></span>
                          <div class="ms-2">
                            <h5 class="mb-0">Settings</h5>
                            <span class="mail-desc">You can customize this template</span>
                          </div>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="link border-top">
                        <div class="d-flex no-block align-items-center p-10">
                          <span class="
                                btn btn-primary btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-account fs-4"></i></span>
                          <div class="ms-2">
                            <h5 class="mb-0">Pavan kumar</h5>
                            <span class="mail-desc">Just see the my admin!</span>
                          </div>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="link border-top">
                        <div class="d-flex no-block align-items-center p-10">
                          <span class="
                                btn btn-danger btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-link fs-4"></i></span>
                          <div class="ms-2">
                            <h5 class="mb-0">Luanch Admin</h5>
                            <span class="mail-desc">Just see the my new admin!</span>
                          </div>
                        </div>
                      </a>
                    </div>
                  </li>
                </ul>
              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-wallet me-1 ms-1"></i> My Balance</a>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-email me-1 ms-1"></i> Inbox</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-settings me-1 ms-1"></i> Account
                  Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                <div class="dropdown-divider"></div>
                <div class="ps-4 p-10">
                  <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">View Profile</a>
                </div>
              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin')}}" aria-expanded="false">
                <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
            </li>


            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('users.index')}}" aria-expanded="false">
                  <svg class="mdi" xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1em" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4"/></svg>
                  <span class="hide-menu">Users</span></a>
            </li>


            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('slider')}}" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"><path fill="currentColor" d="M4 15v-3H2V2h12v3h2v3h2v10H6v-3zm7-12c-1.1 0-2 .9-2 2h4a2 2 0 0 0-2-2m-7 8V6H3v5zm7-3h4a2 2 0 1 0-4 0m-5 6V9H5v5zm9-1a2 2 0 1 0 .001-3.999A2 2 0 0 0 15 13m2 4v-2c-5 0-5-3-10-3v5z"/></svg>
                  <span class="hide-menu">Home Sliders</span></a>
            </li>



              <li class="sidebar-item">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('send_notification.index')}}" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M11.5.75a.75.75 0 0 0-1.5 0V2.5H8.25a.75.75 0 0 0 0 1.5H10v1.75a.75.75 0 0 0 1.5 0V4h1.75a.75.75 0 0 0 0-1.5H11.5zM6 1.5c.369 0 .733.042 1.086.123A2 2 0 0 0 8.25 5.25h.5v.5a2 2 0 0 0 1.822 1.992v1.833c0 .234.1.466.289.642c.219.204.391.283.639.283a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1c.248 0 .42-.079.64-.283a.878.878 0 0 0 .288-.642V5.8c0-1.152.49-2.25 1.351-3.053A4.725 4.725 0 0 1 6 1.5M4.25 13.25A.75.75 0 0 1 5 12.5h2A.75.75 0 0 1 7 14H5a.75.75 0 0 1-.75-.75" clip-rule="evenodd"/></svg>
                      <span class="hide-menu">Send Notification</span></a>
              </li>


            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('map.index')}}" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 100 100"><path fill="currentColor" d="m70.387 70l-3.854 7.247l18.87-3.085c-3.808-1.91-8.963-3.275-15.016-4.162m-48.61 1.58C13.037 73.885 7.5 77.662 7.5 83.272a8.4 8.4 0 0 0 .774 3.497l30.285-4.95zM91.79 80l-42.15 6.87l11.116 12.646C79.01 97.881 92.5 92.05 92.5 83.272c0-1.17-.252-2.257-.71-3.271m-49.272 8.055l-28.48 4.655C21.566 97.374 34.853 100 50 100c.918 0 1.815-.026 2.719-.045z"/><path fill="currentColor" d="M50.002 0c-16.3 0-29.674 13.333-29.674 29.596c0 6.252 1.987 12.076 5.342 16.865l19.234 33.25l.082.107c.759.991 1.5 1.773 2.37 2.348c.87.576 1.95.92 3.01.814c2.118-.212 3.415-1.708 4.646-3.376l.066-.086l21.234-36.141l.012-.023c.498-.9.866-1.816 1.178-2.708a29.246 29.246 0 0 0 2.17-11.05C79.672 13.333 66.302 0 50.002 0m0 17.045c7.071 0 12.59 5.509 12.59 12.55c0 7.043-5.519 12.55-12.59 12.55c-7.072 0-12.594-5.508-12.594-12.55c0-7.04 5.523-12.55 12.594-12.55" color="currentColor"/></svg>
                <span class="hide-menu">Map</span></a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin_order.index')}}" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M4 20V7.1L2.05 2.85L3.85 2L6.2 7.05h11.6L20.15 2l1.8.85L20 7.1V20zm6-7h4q.425 0 .713-.288T15 12t-.288-.712T14 11h-4q-.425 0-.712.288T9 12t.288.713T10 13"/></svg>
                  <span class="hide-menu">Orders</span></a>
            </li>


            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('contact_admin.index')}}" aria-expanded="false">
{{--                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 8V7l-3 2l-3-2v1l3 2m4-7H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2M8 6a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3m6 12H2v-1c0-2 4-3.1 6-3.1s6 1.1 6 3.1m8-5h-8V6h8"/></svg>--}}
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                      <rect width="24" height="24" fill="none" />
                      <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                          <path fill="currentColor" fill-opacity="0" stroke-dasharray="64" stroke-dashoffset="64" d="M8 3C8.5 3 10.5 7.5 10.5 8C10.5 9 9 10 8.5 11C8 12 9 13 10 14C10.3943 14.3943 12 16 13 15.5C14 15 15 13.5 16 13.5C16.5 13.5 21 15.5 21 16C21 18 19.5 19.5 18 20C16.5 20.5 15.5 20.5 13.5 20C11.5 19.5 10 19 7.5 16.5C5 14 4.5 12.5 4 10.5C3.5 8.5 3.5 7.5 4 6C4.5 4.5 6 3 8 3Z">
                              <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0" />
                              <animate fill="freeze" attributeName="fill-opacity" begin="0.6s" dur="0.15s" values="0;0.3" />
                              <animateTransform attributeName="transform" begin="0.6s;lineMdPhoneCallTwotoneLoop0.begin+2.6s" dur="0.5s" type="rotate" values="0 12 12;15 12 12;0 12 12;-12 12 12;0 12 12;12 12 12;0 12 12;-15 12 12;0 12 12" />
                          </path>
                          <path stroke-dasharray="4" stroke-dashoffset="4" d="M14 7.04404C14.6608 7.34734 15.2571 7.76718 15.7624 8.27723M16.956 10C16.6606 9.35636 16.2546 8.77401 15.7624 8.27723" opacity="0">
                              <set id="lineMdPhoneCallTwotoneLoop0" attributeName="opacity" begin="0.7s;lineMdPhoneCallTwotoneLoop0.begin+2.7s" to="1" />
                              <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s;lineMdPhoneCallTwotoneLoop0.begin+2.7s" dur="0.2s" values="4;8" />
                              <animate fill="freeze" attributeName="stroke-dashoffset" begin="1.3s;lineMdPhoneCallTwotoneLoop0.begin+3.3s" dur="0.3s" values="0;4" />
                              <set attributeName="opacity" begin="1.6s;lineMdPhoneCallTwotoneLoop0.begin+3.6s" to="0" />
                          </path>
                          <path stroke-dasharray="10" stroke-dashoffset="10" d="M20.748 9C20.3874 7.59926 19.6571 6.347 18.6672 5.3535M15 3.25203C16.4105 3.61507 17.6704 4.3531 18.6672 5.3535" opacity="0">
                              <set attributeName="opacity" begin="1s;lineMdPhoneCallTwotoneLoop0.begin+3s" to="1" />
                              <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s;lineMdPhoneCallTwotoneLoop0.begin+3s" dur="0.2s" values="10;20" />
                              <animate fill="freeze" attributeName="stroke-dashoffset" begin="1.5s;lineMdPhoneCallTwotoneLoop0.begin+3.5s" dur="0.3s" values="0;10" />
                              <set attributeName="opacity" begin="1.8s;lineMdPhoneCallTwotoneLoop0.begin+3.8s" to="0" />
                          </path>
                      </g>
                  </svg>

                  <span class="hide-menu">Contact</span></a>
            </li>





            <li class="sidebar-item">
              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1148 1152q-83-62-179-95t-201-33q-88 0-170 23t-153 64t-129 100t-100 130t-65 153t-23 170H0q0-120 35-231t101-205t156-167t204-115q-56-35-100-82t-76-104t-47-119t-17-129q0-106 40-199t110-162T569 41T768 0t199 40t162 110t110 163t41 199q0 66-16 129t-48 119t-76 103t-101 83q60 23 113 54v152zM384 512q0 80 30 149t82 122t122 83t150 30q79 0 149-30t122-82t83-122t30-150q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149m1664 768v768H1024v-768h256v-256h512v256zm-640 0h256v-128h-256zm512 384h-128v128h-128v-128h-256v128h-128v-128h-128v256h768zm0-256h-768v128h768z"/></svg>
                  <span class="hide-menu">Products Management </span></a>
              <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                      <a href="{{route('product.index')}}" class="sidebar-link">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><path d="M44 14L24 4L4 14V34L24 44L44 34V14Z"/><path stroke-linecap="round" d="M4 14L24 24"/><path stroke-linecap="round" d="M24 44V24"/><path stroke-linecap="round" d="M44 14L24 24"/><path stroke-linecap="round" d="M34 9L14 19"/></g></svg>
                          <span class="hide-menu"> Products </span></a>
                  </li>
                <li class="sidebar-item">
                  <a href="{{route('brand.index')}}" class="sidebar-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="m15 4l-3 2l-3-2c-.586.51-1.93 1.293-1.997 2.146c-.029.37.126.571.435.975C8.112 8.002 9 8.521 9 10h6c0-1.48.888-1.998 1.562-2.879c.31-.404.464-.606.434-.975C16.93 5.293 15.587 4.509 15 4M9 4V2m6 2V2m-5.5 8h5m3.5 9c2 0 3-2.173 3-2.173c-2.825-1.836-4.5-3.993-5.413-5.622c-.347-.62-.521-.93-.755-1.068C14.598 10 14.285 10 13.659 10H10.34c-.626 0-.939 0-1.173.137s-.408.447-.755 1.068C7.5 12.834 5.825 14.99 3 16.827C3 16.827 4 19 6 19"/><path d="M13.706 14c.34.796 1.815 2.671 3.435 4.31c.597.605.896.907.855 1.42c-.04.512-.29.683-.79 1.025C16.07 21.53 14.336 22 12 22s-4.07-.469-5.207-1.245c-.5-.342-.75-.513-.79-1.025c-.04-.513.259-.815.856-1.42c1.62-1.639 3.096-3.514 3.435-4.31"/></g></svg>
                      <span class="hide-menu"> Brands </span></a>
                </li>
                <li class="sidebar-item">
                  <a href="{{route('color.index')}}" class="sidebar-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M8.65 20.5L2.5 14.35q-.25-.25-.375-.55T2 13.175t.125-.625T2.5 12l5.75-5.725l-2.65-2.65L7.15 2l10 10q.25.25.363.55t.112.625t-.112.625t-.363.55L11 20.5q-.25.25-.55.375T9.825 21t-.625-.125t-.55-.375M9.825 7.85l-5.35 5.35h10.7zM19.8 21q-.9 0-1.525-.638T17.65 18.8q0-.675.338-1.275t.762-1.175L19.8 15l1.1 1.35q.4.575.75 1.175T22 18.8q0 .925-.65 1.563T19.8 21"/></svg>
                      <span class="hide-menu"> Colors </span></a>
                </li>

                  <li class="sidebar-item">
                      <a href="{{route('featuredProduct.index')}}" class="sidebar-link">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M20 8H4V6h16Zm-2-6H6v2h12Zm4 10v8a2 2 0 0 1-2 2H4a2.006 2.006 0 0 1-2-2v-8a2.006 2.006 0 0 1 2-2h16a2.006 2.006 0 0 1 2 2m-8.073 5.042l2.323-1.986l-3.059-.256L12 12l-1.191 2.8l-3.059.256l2.323 1.986l-.7 2.958L12 18.428L14.627 20Z"/></svg>
                          <span class="hide-menu"> Featured Product </span></a>
                  </li>

                  <li class="sidebar-item">
                      <a href="{{route('discount.index')}}" class="sidebar-link">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 15 15"><path fill="currentColor" fill-rule="evenodd" d="m6.448.436l-1.13 1.129a.488.488 0 0 1-.344.143H3.196c-.822 0-1.488.666-1.488 1.488v1.778a.49.49 0 0 1-.143.345L.435 6.448a1.488 1.488 0 0 0 0 2.104l1.13 1.13a.488.488 0 0 1 .143.344v1.778c0 .822.666 1.488 1.488 1.488h1.778a.49.49 0 0 1 .345.143l1.129 1.13a1.488 1.488 0 0 0 2.104 0l1.13-1.13a.488.488 0 0 1 .344-.143h1.778c.822 0 1.488-.666 1.488-1.488v-1.778a.49.49 0 0 1 .143-.345l1.13-1.129a1.488 1.488 0 0 0 0-2.104l-1.13-1.13a.488.488 0 0 1-.143-.344V3.196c0-.822-.666-1.488-1.488-1.488h-1.778a.488.488 0 0 1-.345-.143L8.552.435a1.488 1.488 0 0 0-2.104 0m-1.802 9.21l5-5l.708.708l-5 5zM5 5v1h1V5zm4 5h1V9H9z" clip-rule="evenodd"/></svg>
                          <span class="hide-menu"> Discount Code </span></a>
                  </li>


              </ul>
            </li>

              <li class="sidebar-item">
                  <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 6.5h9.75c2.107 0 3.16 0 3.917.506a3 3 0 0 1 .827.827c.442.661.498 1.549.505 3.167M12 6.5l-.633-1.267c-.525-1.05-1.005-2.106-2.168-2.542C8.69 2.5 8.108 2.5 6.944 2.5c-1.816 0-2.724 0-3.406.38A3 3 0 0 0 2.38 4.038C2 4.72 2 5.628 2 7.444V10.5c0 4.714 0 7.071 1.464 8.535c1.3 1.3 3.304 1.447 7.036 1.463h.5m7-.284V21.5m0-1.286a3.36 3.36 0 0 1-2.774-1.43M18 20.213a3.36 3.36 0 0 0 2.774-1.43M18 13.785c1.157 0 2.176.568 2.774 1.43M18 13.787a3.36 3.36 0 0 0-2.774 1.43M18 13.787V12.5m4 1.929l-1.226.788M14 19.57l1.226-.788M14 14.43l1.226.788M22 19.57l-1.226-.788m0-3.566a3.12 3.12 0 0 1 0 3.566m-5.548-3.566a3.12 3.12 0 0 0 0 3.566" color="currentColor"/></svg>
                      <span class="hide-menu">Categories Management </span></a>
                  <ul aria-expanded="false" class="collapse first-level">

                      <li class="sidebar-item">
                          <a href="{{route('category.index')}}" class="sidebar-link">
                              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" d="M14 25h14v2H14zm-6.83 1l-2.58 2.58L6 30l4-4l-4-4l-1.42 1.41zM14 15h14v2H14zm-6.83 1l-2.58 2.58L6 20l4-4l-4-4l-1.42 1.41zM14 5h14v2H14zM7.17 6L4.59 8.58L6 10l4-4l-4-4l-1.42 1.41z"/></svg>
                              <span class="hide-menu"> Categories </span></a>
                      </li>
                     <li class="sidebar-item">
                          <a href="{{route('sort_category')}}" class="sidebar-link">
                              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" d="M27 22.141V18a2 2 0 0 0-2-2h-8v-4h2a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2v4H7a2 2 0 0 0-2 2v4.142a4 4 0 1 0 2 0V18h8v4.142a4 4 0 1 0 2 0V18h8v4.141a4 4 0 1 0 2 0M13 4h6l.001 6H13ZM8 26a2 2 0 1 1-2-2a2 2 0 0 1 2 2m10 0a2 2 0 1 1-2-2a2.003 2.003 0 0 1 2 2m8 2a2 2 0 1 1 2-2a2 2 0 0 1-2 2"/></svg>
                              <span class="hide-menu">Sort Categories </span></a>
                      </li>



                  </ul>
              </li>




          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">

        <!-- Content -->
        @yield('content')
        <!--/ Content -->

      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">
        All Rights Reserved by Me
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>





    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
  <!--Wave Effects -->
  <script src="{{asset('dist/js/waves.js') }}"></script>
  <!--Menu sidebar -->
  <script src="{{asset('dist/js/sidebarmenu.js') }}"></script>
  <!--Custom JavaScript -->
  <script src="{{asset('dist/js/custom.min.js') }}"></script>
  <!--This page JavaScript -->
  <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
  <!-- Charts js Files -->
  <script src="{{asset('assets/libs/flot/excanvas.js') }}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.js') }}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.pie.js') }}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.time.js') }}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.stack.js') }}"></script>
  <script src="{{asset('assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
  <script src="{{asset('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
  <script src="{{asset('dist/js/pages/chart/chart-page-init.js') }}"></script>

  <!-- DataTables JavaScript -->
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>


  <script src="{{asset('js/confirmDelete.js') }}"></script>


  <script src="https://www.trivule.com/js/trivule.js"></script>

        <!-- Content -->
        @yield('added_script')
        <!--/ Content -->
</body>

</html>
