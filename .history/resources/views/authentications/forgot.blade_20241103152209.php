<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Emergency time is the platform where you get your medication at your doorstep with world best doctors">
    <meta name="keywords" content="online medication, emergency, health, doctor, hospital">
    <meta name="author" content="emergencytime">
    <title>EMERGENCY TIME</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Flag icon css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/iconly-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bulk-style.css') }}">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/themify.css') }}">
    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome-min.css') }}">
    <!-- Weather Icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/weather-icons/weather-icons.min.css') }}">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">
</head>
<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on top ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">     
            <div class="login-card login-dark">
              <div>
                <div><a class="logo" href="index.html"><img class="img-fluid for-light m-auto" src="../assets/images/logo/logo1.png" alt="looginpage"><img class="for-dark" src="../assets/images/logo/logo-dark.png" alt="logo"></a></div>
                <div class="login-main"> 
                  <!-- Email Form -->
                  <form class="theme-form" action="{{ route('password.reset.request') }}" method="POST">
                    @csrf
                    <h2>Reset Your Password</h2>
                    <div class="form-group">
                      <label class="col-form-label">Enter Your Email Address</label>
                      <input class="form-control mb-1" type="email" name="email" required placeholder="youremail@example.com">
                      <div class="text-end">
                        <button class="btn btn-primary btn-block m-t-10" type="submit">Send OTP</button>
                      </div>
                    </div>
                    <div class="mt-4 mb-4"><span class="reset-password-link">If you don't receive OTP? <a class="btn-link text-danger" href="#">Resend</a></span></div>
                  </form>

                  <!-- OTP Form -->
                  <form class="theme-form mt-4" action="{{ route('password.reset.verify') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label class="col-form-label pt-0">Enter OTP</label>
                      <div class="row">
                        <div class="col">
                          <input class="form-control text-center opt-text" type="text" name="otp" required maxlength="6" placeholder="Enter OTP">
                        </div>
                      </div>
                    </div>
                    <h6 class="mt-4 f-w-700">Create Your Password</h6>
                    <div class="form-group">
                      <label class="col-form-label">New Password</label>
                      <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" required placeholder="*********">
                        <div class="show-hide"><span class="show"></span></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Retype Password</label>
                      <input class="form-control" type="password" name="password_confirmation" required placeholder="*********">
                    </div>
                    <div class="form-group mb-0 checkbox-checked">
                      <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Done</button>
                    </div>
                    <p class="mt-4 mb-0 text-center">Already have a password? <a class="ms-2" href="login.html">Sign in</a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('admin/assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/password.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>
</html>
