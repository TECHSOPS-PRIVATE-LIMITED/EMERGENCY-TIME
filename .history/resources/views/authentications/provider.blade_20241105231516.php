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
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet">
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
    <style>
        .login-card {
            background-image: url("{{ asset('admin/images/login/login_bg.jpg') }}");
            /* Additional styling can go here */
        }
    </style>
<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on top ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- Register page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
            <div>
                <a class="logo" href="index.html">
                    <img class="img-fluid for-light m-auto" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="loginpage" style="width: 100px; height: auto;">
                    <img class="img-fluid for-dark" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="logo" style="width: 100px; height: auto;">
                </a>
            </div>
            <div class="login-main" style="width: auto;">
                <form class="theme-form"  action="{{ route('register') }}" method="POST">
                  @csrf <!-- Include CSRF token for security -->
                  <h2 class="text-center">Create your account</h2>
                  <p class="text-center">Enter your personal details to create account</p>
                  <div class="form-group">
                    <label class="col-form-label pt-0">Your Name</label>
                    <div class="row g-2">
                      <div class="col-6">
                        <input class="form-control" type="text" name="first_name" required="" placeholder="First name">
                      </div>
                      <div class="col-6">
                        <input class="form-control" type="text" name="last_name" required="" placeholder="Last name">
                      </div>
                      <div class="col-6">
                        <input class="form-control" type="text" name="last_name" required="" placeholder="Last name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" placeholder="*********">
                      <div class="show-hide"><span class="show"></span></div>
                    </div>
                  </div>
                  <div class="form-group mb-0 checkbox-checked">
                    <div class="form-check checkbox-solid-info">
                      <input class="form-check-input" id="solid6" type="checkbox" required>
                      <label class="form-check-label" for="solid6">Agree with</label><a class="ms-3 link" href="forget-password.html">Privacy Policy</a>
                    </div>
                    <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Create Patient Account</button>
                    <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Register as a Provider</button>
                  </div>
                  <div class="login-social-title">
                    <h6>Or Sign up with</h6>
                  </div>
                  
                  <div class="form-group">
                    <ul class="login-social">
                      <li><a href="https://www.linkedin.com" target="_blank"><i class="icon-linkedin"></i></a></li>
                      <li><a href="https://twitter.com" target="_blank"><i class="icon-twitter"></i></a></li>
                      <li><a href="https://www.facebook.com" target="_blank"><i class="icon-facebook"></i></a></li>
                      <li><a href="https://www.instagram.com" target="_blank"><i class="icon-instagram"></i></a></li>
                    </ul>
                  </div>
                  <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="{{ route('login')}}">Sign in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     <!-- Scripts -->
     
    </div>
  </body>
</html>
<script src="{{ asset('admin/assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/password.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>