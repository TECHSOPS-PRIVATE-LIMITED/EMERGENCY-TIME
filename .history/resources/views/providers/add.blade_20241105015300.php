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

                        <!-- Personal Information Section -->
                        <h3>Personal Information</h3>
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

                        <!-- Professional Information Section -->
                        <h3>Professional Information</h3>
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

                        <!-- Consultation Details Section -->
                        <h3>Consultation Details</h3>
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

                        <!-- Bank Information Section -->
                        <h3>Bank Information</h3>
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

                        <!-- Status Section -->
                        <h3>Status & Others</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option
