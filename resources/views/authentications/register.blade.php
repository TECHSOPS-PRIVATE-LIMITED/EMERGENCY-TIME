<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Emergency time is the platform where you get your medication at your doorstep with world best doctors">
    <meta name="keywords" content="online medication, emergency, health, doctor, hospital">
    <meta name="author" content="emergencytime">
    <title>EMERGENCY TIME</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap"
        rel="stylesheet">
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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/assets/css/vendors/weather-icons/weather-icons.min.css') }}">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">
    <style>
        .login-card {
            background-image: url("{{ asset('admin/images/login/login_bg.jpg') }}");
        }

        /* Step Progress Bar */
        .step-progress {
            text-align: center;
            margin-bottom: 20px;
        }

        .step-line {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .step-line-bar {
            width: 40px;
            height: 3px;
            background: #ddd;
            margin: 0 10px;
        }

        .step-dot {
            width: 30px;
            height: 30px;
            background: #ddd;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .step-dot.active {
            background: #3e95cd;
        }

        .step-label {
            font-size: 14px;
            color: #999;
            margin-top: 5px;
        }

        .step-label.active {
            color: #3e95cd;
            font-weight: bold;
        }

        .profile-pic-container {
            position: relative;
            display: inline-block;
        }

        .camera-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: #007bff;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .camera-icon i {
            color: white;
            font-size: 12px;
        }

        .profile-preview {
            cursor: pointer;
            border: 2px solid #ddd;
        }

        .step-content {
            display: none !important;
        }

        .step-content[style*="display: block"] {
            display: block !important;
        }
    </style>

</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
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

                        <div class="login-main">
                            <form class="theme-form" action="{{ route('register') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <h2 class="text-center">Create your account</h2>

                                <!-- Step Progress Bar -->
                                <div class="step-progress">
                                    <div class="step-line">
                                        <div class="step-dot active" data-step="1">1</div>
                                        <div class="step-line-bar"></div>
                                        <div class="step-dot" data-step="2">2</div>
                                        <div class="step-line-bar"></div>
                                        <div class="step-dot" data-step="3">3</div>
                                    </div>

                                </div>

                                <!-- Step 1 -->
                                <div class="step-content" data-step="1" style="display: block;">
                                    <!-- Existing Step 1 Content -->
                                    <div class="form-group">
                                        <label class="col-form-label pt-0">Your Name</label>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <input class="form-control @error('first_name') is-invalid @enderror"
                                                    type="text" name="first_name" value="{{ old('first_name') }}"
                                                    required placeholder="First name">
                                                @error('first_name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control @error('last_name') is-invalid @enderror"
                                                    type="text" name="last_name" value="{{ old('last_name') }}"
                                                    required placeholder="Last name">
                                                @error('last_name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Email Address</label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            type="email" name="email" value="{{ old('email') }}" required
                                            placeholder="Test@gmail.com">
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Password</label>
                                        <div class="form-input position-relative">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                type="password" name="password" required placeholder="*********">
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="button" class="btn btn-primary btn-block w-100 next-step"
                                            data-next-step="2">Next Step</button>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="step-content" data-step="2" style="display: none;">
                                    <div class="form-group text-center">
                                        <div class="profile-pic-container">
                                            <img id="profileIcon"
                                                src="{{ asset('site/images/registrationprofile.png') }}"
                                                class="profile-preview rounded-circle" width="100" height="100"
                                                onclick="document.getElementById('hiddenProfileInput').click()">

                                            <!-- Hidden File Input -->
                                            <input type="file" id="hiddenProfileInput" name="profile_pic"
                                                accept="image/*" hidden onchange="previewProfilePic(event)">

                                            <!-- Camera Icon -->
                                            <div class="camera-icon"
                                                onclick="document.getElementById('hiddenProfileInput').click()">
                                                <i class="fas fa-camera"></i>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label">CNIC</label>
                                            <input class="form-control @error('cnic') is-invalid @enderror"
                                                type="text" name="cnic" value="{{ old('cnic') }}" required
                                                placeholder="XXXXX-XXXXXXX-X">
                                            @error('cnic')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label">Phone Number</label>
                                            <input class="form-control @error('phone') is-invalid @enderror"
                                                type="tel" name="phone" value="{{ old('phone') }}" required
                                                placeholder="+1 234 567 890">
                                            @error('phone')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Country</label>
                                                    <select class="form-control @error('country') is-invalid @enderror"
                                                        name="country">
                                                        <option value="">Select Country</option>
                                                        <option value="pakistan">Pakistan</option>
                                                        <option value="india">India</option>
                                                        <option value="uk"> UK</option>

                                                    </select>
                                                    @error('country')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">City</label>
                                                    <input class="form-control @error('city') is-invalid @enderror"
                                                        type="text" name="city" value="{{ old('city') }}"
                                                        required>
                                                    @error('city')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label">Address</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Gender</label>
                                                    <select class="form-control @error('gender') is-invalid @enderror"
                                                        name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Date of Birth</label>
                                                    <input class="form-control @error('dob') is-invalid @enderror"
                                                        type="date" name="dob" value="{{ old('dob') }}"
                                                        required>
                                                    @error('dob')
                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <button type="button" class="btn btn-secondary btn-block w-100 prev-step"
                                                data-prev-step="1">Back</button>
                                            <button type="button"
                                                class="btn btn-primary btn-block w-100 mt-2 next-step"
                                                data-next-step="3">Next Step</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 3 (New Medical Information Step) -->
                                <div class="step-content" data-step="3" style="display: none;">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Marital Status</label>
                                                <select
                                                    class="form-control @error('marital_status') is-invalid @enderror"
                                                    name="marital_status" required>
                                                    <option value="">Select Status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="divorced">Divorced</option>
                                                    <option value="widowed">Widowed</option>

                                                </select>
                                                @error('marital_status')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Blood Group</label>
                                                <select
                                                    class="form-control @error('blood_group') is-invalid @enderror"
                                                    name="blood_group" required>
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                                @error('blood_group')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Allergies</label>
                                        <textarea class="form-control @error('allergies') is-invalid @enderror" name="allergies"
                                            placeholder="List any allergies">{{ old('allergies') }}</textarea>
                                        @error('allergies')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Current Medications</label>
                                        <textarea class="form-control @error('medications') is-invalid @enderror" name="current_medications"
                                            placeholder="List current medications">{{ old('medications') }}</textarea>
                                        @error('medications')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Chronic Diseases</label>
                                        <textarea class="form-control @error('chronic_diseases') is-invalid @enderror" name="chronic_diseases"
                                            placeholder="List any chronic diseases">{{ old('chronic_diseases') }}</textarea>
                                        @error('chronic_diseases')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="button" class="btn btn-secondary btn-block w-100 prev-step"
                                            data-prev-step="2">Back</button>
                                        <button type="submit"
                                            class="btn btn-primary btn-block w-100 mt-2">Register</button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 checkbox-checked">
                                    <div class="form-check checkbox-solid-info">
                                        <input class="form-check-input" id="solid6" type="checkbox" required>
                                        <label class="form-check-label" for="solid6">Agree with</label>
                                        <a class="ms-3 link" href="forget-password.html">Privacy Policy</a>
                                    </div>
                                </div>

                                <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2"
                                        href="{{ route('login') }}">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function previewProfilePic(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const profileIcon = document.getElementById('profileIcon');
                profileIcon.src = reader.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            // Step navigation
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentStep = this.closest('.step-content');
                    const nextStep = document.querySelector(
                        `.step-content[data-step="${this.dataset.nextStep}"]`);

                    if (validateStep(currentStep.dataset.step)) {
                        currentStep.style.display = 'none';
                        nextStep.style.display = 'block';
                        updateStepIndicators(nextStep.dataset.step);
                    } else {
                        console.log('Validation failed for step:', currentStep.dataset.step);
                        alert('Please fill out all required fields before proceeding.');
                    }
                });
            });

            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentStep = this.closest('.step-content');
                    const prevStep = document.querySelector(
                        `.step-content[data-step="${this.dataset.prevStep}"]`);

                    currentStep.style.display = 'none';
                    prevStep.style.display = 'block';
                    updateStepIndicators(prevStep.dataset.step);
                });
            });

            function updateStepIndicators(activeStep) {
                // Update dots
                document.querySelectorAll('.step-dot').forEach(dot => {
                    dot.classList.toggle('active', dot.dataset.step === activeStep);
                });

                // Update labels
                document.querySelectorAll('.step-label').forEach(label => {
                    label.classList.toggle('active', label.dataset.step === activeStep);
                });
            }

            function validateStep(stepNumber) {
                let isValid = true;
                const currentStep = document.querySelector(`.step-content[data-step="${stepNumber}"]`);

                // Validate required fields
                currentStep.querySelectorAll('[required]').forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('is-invalid');
                        console.log('Validation failed for field:', input.name);
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                // Validate profile picture (if required)
                if (stepNumber === '2') {
                    const profilePicInput = document.getElementById('hiddenProfileInput');
                    if (profilePicInput && profilePicInput.files.length === 0) {
                        isValid = false;
                        console.log('Profile picture is required');
                    }
                }

                return isValid;
            }

            // Show proper step on validation errors
            @if ($errors->any())
                const errorFields = @json($errors->keys());
                const step2Fields = ['profile_pic', 'cnic', 'phone', 'city', 'address', 'gender', 'dob'];
                const step3Fields = ['marital_status', 'blood_group', 'allergies', 'medications',
                    'chronic_diseases'
                ];

                let activeStep = '1';
                if (errorFields.some(field => step3Fields.includes(field))) {
                    activeStep = '3';
                } else if (errorFields.some(field => step2Fields.includes(field))) {
                    activeStep = '2';
                }

                document.querySelectorAll('.step-content').forEach(step => {
                    step.style.display = step.dataset.step === activeStep ? 'block' : 'none';
                });
                updateStepIndicators(activeStep);
            @endif
        });
    </script>
    <script src="{{ asset('admin/assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/password.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>

</html>
