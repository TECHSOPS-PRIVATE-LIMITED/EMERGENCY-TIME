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
        /* Ensure the logo fits well on mobile screens */
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
        }

        .error-message {
            color: red;
            font-size: 0.875em; /* Slightly smaller font size for errors */
        }

        @media (max-width: 767.98px) {
            .logo-container {
                padding: 10px; /* Reduce padding on smaller screens */
            }

            .login {
                padding: 20px; /* Add some padding for better spacing */
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- The logo half -->
            <div class="col-md-6 d-none d-md-flex justify-content-center align-items-center bg-white">
                <div class="logo-container">
                    <img src="{{ asset('admin/assets/images/brand-logos/logo.png') }}" alt="Logo" class="img-fluid">
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
                                                @error('email')
                                                    <div class="error-message">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Password</label>
                                                <input class="form-control" name="password" placeholder="Enter your password" type="password" required>
                                                @error('password')
                                                    <div class="error-message">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>

                                            <div class="row mt-3">
                                                <div class="col-sm-6">
                                                    <button class="btn btn-block w-100 btn-facebook">
                                                        <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                                                    </button>
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <button class="btn btn-block w-100 btn-google" style="background-color: #db4437; color: white;">
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
