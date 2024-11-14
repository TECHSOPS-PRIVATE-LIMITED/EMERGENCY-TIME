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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<body>

<div id="contacts" class="contact-section section gradiant-background pb-90">
    <div class="container">
        <div class="text-center section-head heading-light">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                <img src="{{ asset('admin/assets/images/brand-logos/logo.png') }}" alt="Logo" class="logo mb-4" style="height: 80px;">
                    <h2 class="heading heading-light">Apply for Provider</h2>
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
                                <p style="text-align: left;">Gender</p>
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                           
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Email *</p>
                                <input name="email" type="email" placeholder="Email" class="form-control required">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Phone Number *</p>
                                <input name="phone_number" type="text" placeholder="Phone Number" class="form-control required">
                            </div>
                        </div>

                        <!-- Professional Details -->
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">Speciality</p>
                                <select id="speciality_id" name="speciality_id" class="form-control required">
                                    <option value="">Select Speciality</option>
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->speciality_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">License Number</p>
                                <input name="license_number" type="text" placeholder="License Number" class="form-control">
                            </div>
                        </div>
                      
                        <!-- License Information -->
                        <div class="form-group row">
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">License Authority</p>
                                <input name="license_authority" type="text" placeholder="License Authority" class="form-control">
                            </div>
                            <div class="form-field col-sm-6">
                                <p style="text-align: left;">License Expiry Date</p>
                                <input name="license_expiry" type="date" class="form-control">
                            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#speciality_id').select2({
            width: 100% // Allows clearing the selection
        });
    });
</script>

</body>
</html>

