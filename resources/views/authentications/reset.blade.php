
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
                        <img src="{{ asset('admin/assets/images/media/pngs/6.png')}}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-50p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <a href="index.html" class="header-logo"><img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png')}}"
                                            class="desktop-logo ht-40" alt="logo">
                                            <img src="{{ asset('admin/assets/images/brand-logos/desktop-white.png')}}"
                                            class="desktop-white ht-40" alt="logo">
                                        </a>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h3>Welcome back!</h3>
                                            <h6 class="fw-medium mb-4 fs-17">Reset Your Password</h6>
                                            <form>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Email</label> <input class="form-control"
                                                        placeholder="Enter your email" type="text">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">New Password</label> <input class="form-control"
                                                        placeholder="Enter your New Password" type="text">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Confirm Password</label> <input class="form-control"
                                                        placeholder="Enter your Confirm Password" type="password">
                                                </div>
                                                <a href="{{ route('')}}"  class="btn btn-primary btn-block w-100">Reset Password</a>
                                            </form>
                                            <div class="main-signin-footer mt-3">
                                                <p>Already have an account? <a href="signin.html">Sign In</a></p>
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
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Show Password JS -->
    <script src="../assets/js/show-password.js"></script>

</body>

</html>