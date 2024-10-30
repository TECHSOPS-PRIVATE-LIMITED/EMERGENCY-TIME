
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
<!-- Meta Data -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>EMERGENCY TIME</title>
<meta name="Description" content="Your health companion!">
<meta name="Author" content="TECHSOPS Private Limited">
<meta name="keywords" content="">

<!-- Favicon -->
<link rel="icon" href="{{ asset('admin/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

<!-- Choices JS -->
<script src="{{ asset('admin/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

<!-- Main Theme Js -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>

<!-- Bootstrap Css -->
<link id="style" href="{{ asset('admin/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Style Css -->
<link href="{{ asset('admin/assets/css/styles.min.css') }}" rel="stylesheet">

<!-- Icons Css -->
<link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">

<!-- Node Waves Css -->
<link href="{{ asset('admin/assets/libs/node-waves/waves.min.css') }}" rel="stylesheet"> 

<!-- Simplebar Css -->
<link href="{{ asset('admin/assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

<!-- Color Picker Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

<!-- Choices Css -->
<link rel="stylesheet" href="{{ asset('admin/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

<!-- Jsvector Maps -->
<link rel="stylesheet" href="{{ asset('admin/assets/libs/jsvectormap/css/jsvectormap.min.css') }}">

</head>

<body>
    <div class="container-fluid custom-page">
        <div class="row bg-white">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent-3">
                <div class="row w-100 mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto w-100">
                        <img src="{{asset('admin/assets/images/loginpic.avif')}}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                <div class="login d-flex align-items-center py-2">
                
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="{{ route('login.show')}}"><img src="{{asset('admin/assets/images/brand-logos/logo.png')}}" ></a>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h3>Welcome back!</h3>
                                            <h6 class="fw-medium mb-4 fs-17">Please sign in to continue.</h6>
                                           <form method="POST" action="{{ route('login') }}">
                                                    @csrf 
                                                    
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input class="form-control" name="email" placeholder="Enter your email" type="email" required>
                                                    </div>
                                                    
                                                    <div class="form-group mb-3">
                                                        <label class="form-label">Password</label>
                                                        <input class="form-control" name="password" placeholder="Enter your password" type="password" required>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>

                                                    <div class="row mt-3">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block w-100 btn-facebook">
                                                                <i class="fab fa-facebook-f me-2"></i> Signup with Facebook
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mt-2 mt-sm-0">
                                                            <button class="btn btn-info btn-block w-100">
                                                                <i class="fab fa-twitter me-2"></i> Signup with Twitter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            <div class="main-signin-footer mt-5">
                                                <p class="mb-1"><a href="{{ route('password.request')}}">Forgot password?</a></p>
                                                <p>Don't have an account? <a href="{{ route('register.show') }}">Create an
                                                        Account</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Show Password JS -->
    <script src="{{ asset('admin/assets/js/show-password.js')}}"></script>

</body>

</html>