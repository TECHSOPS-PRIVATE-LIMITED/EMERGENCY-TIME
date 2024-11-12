<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Emergency Time') }}</title>
    <link rel="stylesheet" href="{{ asset('site/assets/css/vendor.bundle.css') }}">
    <link href="{{ asset('site/assets/css/style.css?ver=131') }}" rel="stylesheet">
    <link href="{{ asset('site/assets/css/theme-green-blue.css?ver=131') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.3.1/bootstrap-clockpicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.3.1/bootstrap-clockpicker.min.js"></script>

</head>
<body>

<div id="contacts" class="contact-section section gradiant-background pb-90">
    <div class="container">
        <div class="text-center section-head heading-light">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <img src="{{ asset('site/assets/images/logo.png') }}" alt="Logo" class="logo mb-4">
                    <h2 class="heading heading-light">Register Profile</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center contact-form white-bg">
                    <h3>Complete Your Profile</h3>
                    <p>Provide your details to create a profile.</p>
                    <form id="profile-form" class="form-message" action="{{ route('apply.provider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-results"></div>

                        <!-- Personal Information -->
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Full Name *</p>
                                <input id="full_name" name="full_name" type="text" placeholder="Full Name" class="form-control required">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Date of Birth</p>
                                <input id="date_of_birth" name="date_of_birth" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Gender</p>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Email *</p>
                                <input name="email" type="email" placeholder="Email" class="form-control required">
                            </div>
                        </div>

                        <!-- Contact Details -->
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Phone Number *</p>
                                <input name="phone_number" type="text" placeholder="Phone Number" class="form-control required">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Profile Picture</p>
                                <input name="profile_picture" type="file" class="form-control">
                            </div>
                        </div>

                        <!-- Professional Details -->
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Speciality</p>
                                <select id="speciality_id" name="speciality_id" class="form-control required">
                                    <option value="">Select Speciality</option>
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Sub-Specialization</p>
                                <input name="sub_specialization" type="text" placeholder="Sub-Specialization" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Years of Experience</p>
                                <input name="experience_years" type="number" placeholder="Years of Experience" class="form-control">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Qualifications</p>
                                <input name="qualifications" type="text" placeholder="Qualifications" class="form-control">
                            </div>
                        </div>

                        <!-- License Information -->
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">License Number</p>
                                <input name="license_number" type="text" placeholder="License Number" class="form-control">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">License Authority</p>
                                <input name="license_authority" type="text" placeholder="License Authority" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">License Expiry Date</p>
                                <input name="license_expiry" type="date" class="form-control">
                            </div>
                        </div>

                        <!-- Consultation Details -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <p style="text-align: left;">Consultation Days</p>
                                <div class="form-check" style="text-align: left">
                                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                        <input type="checkbox" class="form-check-input" id="day_{{ $day }}" name="consultation_days[]" value="{{ strtolower($day) }}">
                                        <label class="form-check-label" for="day_{{ $day }}">{{ $day }}</label><br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p style="text-align: left;">Consultation Hours</p>
                                <div class="d-flex">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Start</span>
                                        <input type="text" class="form-control clockpicker" name="consultation_hours[start]" placeholder="Select Time">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">End</span>
                                        <input type="text" class="form-control clockpicker" name="consultation_hours[end]" placeholder="Select Time">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Time Zone</p>
                                <select id="time_zone" name="time_zone" class="form-control">
                                    <option value="">Select Time Zone</option>
                                    @foreach ($timezones as $timezone)
                                        <option value="{{ $timezone->name }}">{{ $timezone->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Max Consultations per Day</p>
                                <input name="max_consultations_per_day" type="number" placeholder="Max Consultations per Day" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Consultation Fee</p>
                                <input name="consultation_fee" type="number" step="0.01" placeholder="Consultation Fee in US $ for 15 mins" class="form-control">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Consultation Type</p>
                                <select name="consultation_type" class="form-control">
                                    <option value="video">Video</option>
                                    <option value="audio">Audio</option>
                                    <option value="chat">Chat</option>
                                    <option value="in-person">In-person</option>
                                </select>
                            </div>
                        </div>

                        <!-- Bank Details -->
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Bank Name</p>
                                <input name="bank_name" type="text" placeholder="Bank Name" class="form-control">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Account Number</p>
                                <input name="account_number" type="text" placeholder="Account Number" class="form-control">
                            </div>
                        </div>

                        <!-- Additional Details -->
                        <div class="form-group">
                            <p style="text-align: left;">Biography</p>
                            <textarea name="biography" rows="4" placeholder="Brief Biography" class="form-control"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="button solid-btn sb-h">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('site/assets/js/jquery.bundle.js') }}"></script>
<script src="{{ asset('site/assets/js/script.js') }}"></script>
</body>
</html>

<script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
$(document).ready(function() {
    // Initialize clockpicker for the start and end time inputs
    $('.clockpicker').clockpicker({
        donetext: 'Done',
        twelvehour: true,  // Optional: If you want 12-hour format instead of 24-hour
        autoclose: true
    });
});
</script>