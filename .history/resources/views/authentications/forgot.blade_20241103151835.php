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
    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="login-main">
                <form id="otp-form" class="theme-form" action="{{ route('password.reset.request') }}" method="POST">
                    @csrf
                    <h2>Reset Your Password</h2>
                    
                    <!-- Email Section -->
                    <div id="email-section">
                        <div class="form-group">
                            <label class="col-form-label">Enter Your Email Address</label>
                            <input class="form-control mb-1" type="email" name="email" required placeholder="youremail@example.com">
                            <div class="text-end">
                                <button class="btn btn-primary btn-block m-t-10" type="submit">Send OTP</button>
                            </div>
                        </div>
                    </div>

                    <!-- OTP Section -->
                    <div id="otp-section" style="display: none;">
                        <div class="form-group">
                            <label class="col-form-label pt-0">Enter OTP</label>
                            <div class="row">
                                <div class="col">
                                    <input class="form-control text-center opt-text" type="text" name="otp" required maxlength="6" placeholder="Enter OTP">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4 f-w-700">Create Your Password</h6>
                    <div class="form-group">
                        <label class="col-form-label">New Password</label>
                        <div class="form-input position-relative">
                            <input class="form-control" type="password" name="password" required placeholder="*********">
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

    <script src="{{ asset('admin/assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <script>
        document.getElementById('otp-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            let emailSection = document.getElementById('email-section');
            let otpSection = document.getElementById('otp-section');
            let emailInput = this.querySelector('input[name="email"]').value;

            // Simulating the OTP sending process (replace this with your actual AJAX request)
            $.ajax({
                url: '/send-otp', // Your endpoint to send the OTP
                method: 'POST',
                data: {
                    email: emailInput,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    // If OTP is sent successfully
                    if (response.success) {
                        emailSection.style.display = 'none'; // Hide email section
                        otpSection.style.display = 'block'; // Show OTP section
                        alert('OTP sent to your email address!');
                    } else {
                        alert('Failed to send OTP. Please try again.');
                    }
                },
                error: function() {
                    alert('Error occurred. Please try again later.');
                }
            });
        });
    </script>
</body>
</html>
