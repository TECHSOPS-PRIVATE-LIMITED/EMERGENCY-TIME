<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta and CSS includes -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMERGENCY TIME</title>
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div class="login-main" style="width: auto;">
                            <form class="theme-form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h2 class="text-center">Create Provider Account</h2>
                                <p class="text-center">Enter your details to create a provider account</p>
                                <div class="row g-3">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Full Name</label>
                                        <input class="form-control" type="text" name="full_name" required maxlength="255">
                                    </div>
                                    <!-- Date of Birth -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Date of Birth</label>
                                        <input class="form-control" type="date" name="date_of_birth">
                                    </div>
                                    <!-- Gender -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Email</label>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                    <!-- Phone Number -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Phone Number</label>
                                        <input class="form-control" type="text" name="phone_number" required>
                                    </div>
                                    <!-- Profile Picture -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Profile Picture</label>
                                        <input class="form-control" type="file" name="profile_picture" accept="image/*">
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Address</label>
                                        <input class="form-control" type="text" name="address" maxlength="255">
                                    </div>
                                    <!-- Nationality -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Nationality</label>
                                        <input class="form-control" type="text" name="nationality" maxlength="255">
                                    </div>
                                    <!-- Speciality -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Speciality</label>
                                        <select class="form-control" name="speciality_id" required>
                                            <!-- Options to be filled dynamically -->
                                        </select>
                                    </div>
                                    <!-- Sub-specialization -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Sub-specialization</label>
                                        <input class="form-control" type="text" name="sub_specialization" maxlength="255">
                                    </div>
                                    <!-- Experience -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Years of Experience</label>
                                        <input class="form-control" type="number" name="experience_years" min="0">
                                    </div>
                                    <!-- Qualifications -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Qualifications</label>
                                        <input class="form-control" type="text" name="qualifications" maxlength="255">
                                    </div>
                                    <!-- License Number -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">License Number</label>
                                        <input class="form-control" type="text" name="license_number">
                                    </div>
                                    <!-- License Authority -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">License Authority</label>
                                        <input class="form-control" type="text" name="license_authority" maxlength="255">
                                    </div>
                                    <!-- License Expiry -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">License Expiry</label>
                                        <input class="form-control" type="date" name="license_expiry">
                                    </div>
                                    <!-- Bio -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Bio</label>
                                        <textarea class="form-control" name="bio" rows="3"></textarea>
                                    </div>
                                    <!-- Consultation Days -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Consultation Days</label>
                                        <select class="form-control" name="consultation_days[]" multiple required>
                                            <option value="monday">Monday</option>
                                            <option value="tuesday">Tuesday</option>
                                            <option value="wednesday">Wednesday</option>
                                            <option value="thursday">Thursday</option>
                                            <option value="friday">Friday</option>
                                            <option value="saturday">Saturday</option>
                                            <option value="sunday">Sunday</option>
                                        </select>
                                    </div>
                                    <!-- Consultation Hours -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Consultation Start Time</label>
                                        <input class="form-control" type="time" name="consultation_hours[start]" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Consultation End Time</label>
                                        <input class="form-control" type="time" name="consultation_hours[end]" required>
                                    </div>
                                    <!-- Time Zone -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Time Zone</label>
                                        <input class="form-control" type="text" name="time_zone">
                                    </div>
                                    <!-- Max Consultations Per Day -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Max Consultations Per Day</label>
                                        <input class="form-control" type="number" name="max_consultations_per_day">
                                    </div>
                                    <!-- Consultation Fee -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Consultation Fee</label>
                                        <input class="form-control" type="number" step="0.01" name="consultation_fee">
                                    </div>
                                    <!-- Consultation Type -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Consultation Type</label>
                                        <select class="form-control" name="consultation_type">
                                            <option value="">Select</option>
                                            <option value="video">Video</option>
                                            <option value="audio">Audio</option>
                                            <option value="chat">Chat</option>
                                            <option value="in-person">In-person</option>
                                        </select>
                                    </div>
                                    <!-- Bank Name -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Bank Name</label>
                                        <input class="form-control" type="text" name="bank_name" maxlength="255">
                                    </div>
                                    <!-- Account Number -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Account Number</label>
                                        <input class="form-control" type="text" name="account_number" maxlength="255">
                                    </div>
                                    <!-- Consultation Duration -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Consultation Duration (mins)</label>
                                        <input class="form-control" type="number" name="consultation_duration">
                                    </div>
                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                    <!-- Is Verified -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Is Verified</label>
                                        <input type="checkbox" name="is_verified">
                                    </div>
                                    <!-- Registered Date -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Registered Date</label>
                                        <input class="form-control" type="date" name="registered_date">
                                    </div>
                                    <!-- Last Login -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Last Login</label>
                                        <input class="form-control" type="datetime-local" name="last_login">
                                    </div>
                                    <!-- Submission -->
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/js/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
    <script src="{{ asset('admin/assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/password.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>
</html>

