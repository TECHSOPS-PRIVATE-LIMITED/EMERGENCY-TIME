<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EMERGENCY TIME</title>
    <link rel="stylesheet" href="{{ asset('site/assets/css/vendor.bundle.css') }}">
    <link href="{{ asset('site/assets/css/style.css?ver=131') }}" rel="stylesheet">
    <link href="{{ asset('site/assets/css/theme-green-blue.css?ver=131') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.3.1/bootstrap-clockpicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.3.1/bootstrap-clockpicker.min.js"></script>
</head>
<body>
    <!-- Custom pixel spacing for precise control -->
    <div class="container text-center" style="margin-top: 50px;">
        <img src="{{ asset('admin/assets/images/brand-logos/logo.png') }}" alt="Logo" style="height: 130px; margin-top: 20px;" class="mb-4">
        
        <h2>Application Submitted Successfully!</h2>
        <p>Thank you for completing your provider profile. Our team will review your information and reach out shortly.</p>

        <h3>Terms & Conditions</h3>
        <p>Please review our Terms & Conditions:</p>
        <p>1. By submitting your information, you agree to our privacy policy and service terms.<br>
           2. You confirm that the details provided are accurate and truthful.<br>
           3. Any violations of these terms may result in profile suspension.</p>

        <a href="{{ route('index') }}" class="button solid-btn sb-h mt-4">Return to Home</a>
    </div>

    <script src="{{ asset('site/assets/js/jquery.bundle.js') }}"></script>
    <script src="{{ asset('site/assets/js/script.js') }}"></script>
</body>
</html>
