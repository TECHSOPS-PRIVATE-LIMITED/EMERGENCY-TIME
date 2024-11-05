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
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="card mx-auto mt-5" style="max-width: 600px;">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="logo" style="width: 100px;">
                        </div>
                        <h2 class="text-center">Create your account</h2>
                        <p class="text-center">Enter your personal details to create account</p>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" required placeholder="First Name">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" required placeholder="Last Name">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required placeholder="Test@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required placeholder="*********">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="privacyPolicy" required>
                                <label class="form-check-label" for="privacyPolicy">
                                    Agree with <a href="privacy-policy.html">Privacy Policy</a>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mb-2">Create Patient Account</button>
                            <button type="submit" class="btn btn-secondary w-100">Register as a Provider</button>
                        </form>
                        <div class="text-center mt-4">
                            <h6>Or Sign up with</h6>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <p class="text-center mt-4">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
