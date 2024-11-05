@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Edit Provider</h2>
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
            <form action="{{ route('providers.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="full_name" class="form-label">Full Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $provider->full_name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $provider->date_of_birth) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="" disabled>Select Gender</option>
                                <option value="male" {{ old('gender', $provider->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', $provider->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender', $provider->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $provider->email) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $provider->phone_number) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            @if($provider->profile_picture)
                                <img src="{{ asset($provider->profile_picture) }}" alt="Profile Picture" class="img-thumbnail mt-2" width="100">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $provider->address) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" value="{{ old('nationality', $provider->nationality) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="speciality_id" class="form-label">Speciality</label>
                            <select class="form-select" id="speciality_id" name="speciality_id">
                                @foreach($specialities as $speciality)
                                    <option value="{{ $speciality->id }}" {{ old('speciality_id', $provider->speciality_id) == $speciality->id ? 'selected' : '' }}>{{ $speciality->speciality_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="sub_specialization" class="form-label">Sub-Specialization</label>
                            <input type="text" class="form-control" id="sub_specialization" name="sub_specialization" value="{{ old('sub_specialization', $provider->sub_specialization) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="experience_years" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control" id="experience_years" name="experience_years" value="{{ old('experience_years', $provider->experience_years) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="qualifications" class="form-label">Qualifications</label>
                            <input type="text" class="form-control" id="qualifications" name="qualifications" value="{{ old('qualifications', $provider->qualifications) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="license_number" class="form-label">License Number</label>
                            <input type="text" class="form-control" id="license_number" name="license_number" value="{{ old('license_number', $provider->license_number) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="license_authority" class="form-label">License Authority</label>
                            <input type="text" class="form-control" id="license_authority" name="license_authority" value="{{ old('license_authority', $provider->license_authority) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="license_expiry" class="form-label">License Expiry</label>
                            <input type="date" class="form-control" id="license_expiry" name="license_expiry" value="{{ old('license_expiry', $provider->license_expiry) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="bio" name="bio">{{ old('bio', $provider->bio) }}</textarea>
                        </div>
                        <div class="col-md-6">
    <label for="consultation_days" class="form-label">Consultation Days</label>
    <div class="form-check">
        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
            <input type="checkbox" class="form-check-input" id="day_{{ ucfirst($day) }}" name="consultation_days[]" value="{{ $day }}"
                @if(in_array($day, explode(',', $provider->consultation_days))) checked @endif>
            <label class="form-check-label" for="day_{{ ucfirst($day) }}">{{ ucfirst($day) }}</label><br>
        @endforeach
    </div>
</div>

<div class="col-md-6">
    <label for="consultation_hours" class="form-label">Consultation Hours</label>
    <div class="input-group mb-3">
        <span class="input-group-text">Start</span>
        <input type="time" class="form-control" name="consultation_hours[start]" value="{{ $provider->consultation_hours['start'] ?? '' }}">
        <span class="input-group-text">End</span>
        <input type="time" class="form-control" name="consultation_hours[end]" value="{{ $provider->consultation_hours['end'] ?? '' }}">
    </div>
</div>

<div class="col-md-6">
    <label for="time_zone" class="form-label">Time Zone</label>
    <select class="form-select" id="time_zone" name="timezone">
        @foreach($timezones as $timezone)
            <option value="{{ $timezone->timezone }}" @if($provider->timezone == $timezone->timezone) selected @endif>
                {{ $timezone->timezone }}
            </option>
        @endforeach
    </select>
</div>


                        <div class="col-md-6">
                            <label for="max_consultations_per_day" class="form-label">Max Consultations Per Day</label>
                            <input type="number" class="form-control" id="max_consultations_per_day" name="max_consultations_per_day" value="{{ old('max_consultations_per_day', $provider->max_consultations_per_day) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="consultation_fee" class="form-label">Consultation Fee</label>
                            <input type="text" class="form-control" id="consultation_fee" name="consultation_fee" value="{{ old('consultation_fee', $provider->consultation_fee) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="consultation_type" class="form-label">Consultation Type</label>
                            <select class="form-select" id="consultation_type" name="consultation_type">
                                <option value="video" {{ old('consultation_type', $provider->consultation_type) == 'video' ? 'selected' : '' }}>Video</option>
                                <option value="audio" {{ old('consultation_type', $provider->consultation_type) == 'audio' ? 'selected' : '' }}>Audio</option>
                                <option value="chat" {{ old('consultation_type', $provider->consultation_type) == 'chat' ? 'selected' : '' }}>Chat</option>
                                <option value="in-person" {{ old('consultation_type', $provider->consultation_type) == 'in-person' ? 'selected' : '' }}>In-Person</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="bank_name" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name', $provider->bank_name) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="account_number" class="form-label">Account Number</label>
                            <input type="text" class="form-control" id="account_number" name="account_number" value="{{ old('account_number', $provider->account_number) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="consultation_duration" class="form-label">Consultation Duration (minutes)</label>
                            <input type="number" class="form-control" id="consultation_duration" name="consultation_duration" value="{{ old('consultation_duration', $provider->consultation_duration) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="is_verified" class="form-label">Is Verified</label>
                            <select class="form-select" id="is_verified" name="is_verified">
                                <option value="1" {{ old('is_verified', $provider->is_verified) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_verified', $provider->is_verified) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="active" {{ old('status', $provider->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $provider->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="pending" {{ old('status', $provider->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('providers.update', $provider->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Your form fields go here -->

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('providers.index') }}" class="btn btn-primary">Cancel</a>
                </form>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
