<!DOCTYPE html>
<html lang="en" dir="ltr">

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

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('admin/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('admin/assets/css/styles.min.css') }}" rel="stylesheet">

    <!-- Font Awesome (for social media icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .btn-facebook, .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .btn-facebook {
            background-color: #3b5998;
            color: white;
        }

        .btn-google {
            background-color: #db4437;
            color: white;
        }

        .btn-facebook:hover {
            background-color: #365e92;
        }

        .btn-google:hover {
            background-color: #c13529;
        }
        
        .logo-text {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- The logo half -->
            <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center" style="background-color: white;">
                <div class="text-center">
                    <img src="{{ asset('admin/assets/images/brand-logos/logo.png') }}" alt="Logo" class="img-fluid">
                    <p class="logo-text">Your Health Companion</p> <!-- Text below the logo -->
                </div>
            </div>
            <!-- The form half -->
            <div class="col-md-6 bg-white py-4">
                <div class="login d-flex align-items-center py-2">
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 mx-auto">
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
                                                    <button class="btn btn-facebook btn-block w-100">
                                                        <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                                                    </button>
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <button class="btn btn-google btn-block w-100">
                                                        <i class="fab fa-google me-2"></i> Sign in with Google
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="main-signin-footer mt-4">
                                                <p class="mb-1"><a href="{{ route('password.request')}}">Forgot password?</a></p>
                                                <p>Don't have an account? <a href="{{ route('register.show') }}">Create an Account</a></p>
                                            </div>
                                        </form>
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
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>