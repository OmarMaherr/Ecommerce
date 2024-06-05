<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="../dist/css/style.min.css" rel="stylesheet" />

</head>

<body>
  <div class="main-wrapper" style="    width: 100%;
    height: 100%;
    position: fixed;">
    <!-- style="    padding: 15%;" -->

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>

    <div class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark
        " style="    width: 100%;
    height: 100%;">
      <div class="auth-box bg-dark border-top border-secondary">
        <div id="loginform">
          <div class="text-center pt-3 pb-3">
            <span class="db"><img src="../assets/images/logo.png" alt="logo" /></span>
          </div>
          <!-- Form -->
          <form class="form-horizontal mt-3" id="loginform" action="{{route('admin.login')}}" method="POST">
            @csrf
            <div class="row pb-4">
              <div class="col-12">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                  </div>
                  <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" name="email" required="" />
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                  </div>
                  <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" required="" />
                </div>
                <div class="row border-top border-secondary">
                  <div class="col-12">
                    <div class="form-group">
                      <div class="pt-3 d-grid">
                        <button class="btn btn-block btn-lg btn-info" type="submit">
                          Log in
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 form-group">
                  @include('alerts.error-alert')
                  @include('alerts.success-alert')
                </div>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script>
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $("#to-recover").on("click", function() {
      $("#loginform").slideUp();
      $("#recoverform").fadeIn();
    });
    $("#to-login").click(function() {
      $("#recoverform").hide();
      $("#loginform").fadeIn();
    });
  </script>
</body>

</html>