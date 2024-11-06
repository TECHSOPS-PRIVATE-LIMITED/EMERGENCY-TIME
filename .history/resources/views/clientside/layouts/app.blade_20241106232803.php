<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Emergency Time is the platform where you can find solutions for your all medical issues"/>
    <meta name="keywords" content="MEDICAL AI BOT, EMERGENCY TIME"/>
    <meta name="author" content="TECHSOPS PRIVATE LIMITED"/>
    <title>EMERGENCY TIME</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon"/>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet"/>
    <!-- Flag icon css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/iconly-icon.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bulk-style.css') }}"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/themify.css') }}"/>
    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome-min.css') }}"/>
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/weather-icons/weather-icons.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/datatables.css')}}">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}"/>
    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen"/>
</head>
<body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
    
        <div class="page-body-wrapper">
            @include('clientside.layouts.sidebar')
            @yield('clientside')
            @include('clientside.layouts.footer')
        </div>
        <!-- Yield for main content -->

        <!-- Scripts -->
    <script src="{{ asset('admin/assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/feather-icon/custom-script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sidebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('admin/assets/js/js-datatables/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/js-datatables/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/js-datatables/datatables/datatable.custom1.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/theme-customizer/customizer.js') }}"></script>
    <script src="{{ asset('admin/assets/js/animation/tilt/tilt.jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/js/animation/tilt/tilt-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard/dashboard_1.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>
</html>
