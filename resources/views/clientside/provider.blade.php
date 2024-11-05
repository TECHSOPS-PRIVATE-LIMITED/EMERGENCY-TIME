@extends('clientside.layouts.app')
@section('clientside')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Provider Registration</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Providers</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="card">
            <form action="{{ route('providers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
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
                        <div class="col-md-6">
                            <label for="speciality_id" class="form-label">Speciality</label>
                            <select class="form-select" id="speciality_id" name="speciality_id">
                                @foreach($specialities as $speciality)
                                    <option value="{{ $speciality->id }}">{{ $speciality->speciality_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="sub_specialization" class="form-label">Sub-Specialization</label>
                            <input type="text" class="form-control" id="sub_specialization" name="sub_specialization">
                        </div>
                        <div class="col-md-6">
                            <label for="experience_years" class="form-label">Years of Experience</label>
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
                            <label for="license_expiry" class="form-label">License Expiry</label>
                            <input type="date" class="form-control" id="license_expiry" name="license_expiry">
                        </div>
                        <div class="col-md-6">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="consultation_days" class="form-label">Consultation Days</label>
                            <div class="form-check">
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <input type="checkbox" class="form-check-input" id="day_{{ $day }}" name="consultation_days[]" value="{{ strtolower($day) }}">
                                    <label class="form-check-label" for="day_{{ $day }}">{{ $day }}</label><br>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="consultation_hours" class="form-label">Consultation Hours</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Start</span>
                                <input type="time" class="form-control" name="consultation_hours[start]">
                                <span class="input-group-text">End</span>
                                <input type="time" class="form-control" name="consultation_hours[end]">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="time_zone" class="form-label">Time Zone</label>
                            <select class="form-select" id="time_zone" name="timezone">
                                @foreach($timezones as $timezone)
                                    <option value="{{ $timezone->timezone }}">{{ $timezone->timezone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="max_consultations_per_day" class="form-label">Max Consultations Per Day</label>
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
                            <label for="bank_name" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name">
                        </div>
                        <div class="col-md-6">
                            <label for="account_number" class="form-label">Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number">
                        </div>
                        <div class="col-md-6">
                            <label for="consultation_duration" class="form-label">Consultation Duration (mins)</label>
                            <input type="number" class="form-control" id="consultation_duration" name="consultation_duration" value="30">
                        </div>
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
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Save Provider</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
