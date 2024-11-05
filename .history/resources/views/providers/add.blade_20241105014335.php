@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <!-- Page Title and Breadcrumbs -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Plans</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Plans</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Card Header -->
        <div class="card">
      

            <!-- Form Content Here -->
<form action="{{ route('providers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="horizontal-wizard-wrapper">
        <div class="row g-3">
            <div class="col-12 main-horizontal-header">
                <div class="nav nav-pills horizontal-options" id="horizontal-wizard-tab" role="tablist">
                    
                    <!-- Personal Information Tab -->
                    <a class="nav-link active" id="personal-info-tab" data-bs-toggle="pill" href="#personal-info" role="tab">
                        <div class="horizontal-wizard">
                            <div class="horizontal-wizard-content">
                                <h5>Personal Information</h5>
                            </div>
                        </div>
                    </a>

                    <!-- Professional Information Tab -->
                    <a class="nav-link" id="professional-info-tab" data-bs-toggle="pill" href="#professional-info" role="tab">
                        <div class="horizontal-wizard">
                            <div class="horizontal-wizard-content">
                                <h5>Professional Information</h5>
                            </div>
                        </div>
                    </a>

                    <!-- Consultation Details Tab -->
                    <a class="nav-link" id="consultation-details-tab" data-bs-toggle="pill" href="#consultation-details" role="tab">
                        <div class="horizontal-wizard">
                            <div class="horizontal-wizard-content">
                                <h5>Consultation Details</h5>
                            </div>
                        </div>
                    </a>

                    <!-- Bank Information Tab -->
                    <a class="nav-link" id="bank-info-tab" data-bs-toggle="pill" href="#bank-info" role="tab">
                        <div class="horizontal-wizard">
                            <div class="horizontal-wizard-content">
                                <h5>Bank Information</h5>
                            </div>
                        </div>
                    </a>

                    <!-- Status Tab -->
                    <a class="nav-link" id="status-tab" data-bs-toggle="pill" href="#status" role="tab">
                        <div class="horizontal-wizard">
                            <div class="horizontal-wizard-content">
                                <h5>Status & Others</h5>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-12">
                <div class="tab-content dark-field" id="horizontal-wizard-tabContent">
                    
                    <!-- Personal Information Section -->
                    <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="full_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="col-md-6">
                                <label for="nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality">
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information Section -->
                    <div class="tab-pane fade" id="professional-info" role="tabpanel" aria-labelledby="professional-info-tab">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="speciality_id" class="form-label">Specialty</label>
                                <select class="form-select" id="speciality_id" name="speciality_id">
                                    <!-- Populate with specialty options -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="sub_specialization" class="form-label">Sub Specialization</label>
                                <input type="text" class="form-control" id="sub_specialization" name="sub_specialization">
                            </div>
                            <div class="col-md-6">
                                <label for="experience_years" class="form-label">Experience Years</label>
                                <input type="number" class="form-control" id="experience_years" name="experience_years">
                            </div>
                            <div class="col-md-6">
                                <label for="qualifications" class="form-label">Qualifications</label>
                                <input type="text" class="form-control" id="qualifications" name="qualifications">
                            </div>
                            <div class="col-md-6">
                                <label for="license_number" class="form-label">License Number</label>
                                <input type="text" class="form-control" id="license_number" name="license_number">
                            </div>
                            <div class="col-md-6">
                                <label for="license_authority" class="form-label">License Authority</label>
                                <input type="text" class="form-control" id="license_authority" name="license_authority">
                            </div>
                            <div class="col-md-6">
                                <label for="license_expiry" class="form-label">License Expiry Date</label>
                                <input type="date" class="form-control" id="license_expiry" name="license_expiry">
                            </div>
                            <div class="col-md-12">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Consultation Details Section -->
                    <div class="tab-pane fade" id="consultation-details" role="tabpanel" aria-labelledby="consultation-details-tab">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="consultation_days" class="form-label">Consultation Days</label>
                                <input type="text" class="form-control" id="consultation_days" name="consultation_days">
                            </div>
                            <div class="col-md-6">
                                <label for="consultation_hours" class="form-label">Consultation Hours</label>
                                <input type="text" class="form-control" id="consultation_hours" name="consultation_hours">
                            </div>
                            <div class="col-md-6">
                                <label for="time_zone" class="form-label">Time Zone</label>
                                <input type="text" class="form-control" id="time_zone" name="time_zone">
                            </div>
                            <div class="col-md-6">
                                <label for="max_consultations_per_day" class="form-label">Max Consultations per Day</label>
                                <input type="number" class="form-control" id="max_consultations_per_day" name="max_consultations_per_day">
                            </div>
                            <div class="col-md-6">
                                <label for="consultation_fee" class="form-label">Consultation Fee</label>
                                <input type="number" step="0.01" class="form-control" id="consultation_fee" name="consultation_fee">
                            </div>
                            <div class="col-md-6">
                                <label for="consultation_type" class="form-label">Consultation Type</label>
                                <select class="form-select" id="consultation_type" name="consultation_type">
                                    <option value="video">Video</option>
                                    <option value="audio">Audio</option>
                                    <option value="chat">Chat</option>
                                    <option value="in-person">In-Person</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="consultation_duration" class="form-label">Consultation Duration (minutes)</label>
                                <input type="number" class="form-control" id="consultation_duration" name="consultation_duration" value="30">
                            </div>
                        </div>
                    </div>

                    <!-- Bank Information Section -->
                    <div class="tab-pane fade" id="bank-info" role="tabpanel" aria-labelledby="bank-info-tab">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name">
                            </div>
                            <div class="col-md-6">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="account_number" name="account_number">
                            </div>
                        </div>
                    </div>

                    <!-- Status Section -->
                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="is_verified" class="form-label">Verified</label>
                                <select class="form-select" id="is_verified" name="is_verified">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="registered_date" class="form-label">Registered Date</label>
                                <input type="datetime-local" class="form-control" id="registered_date" name="registered_date">
                            </div>
                            <div class="col-md-6">
                                <label for="last_login" class="form-label">Last Login</label>
                                <input type="datetime-local" class="form-control" id="last_login" name="last_login">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Save Provider</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
