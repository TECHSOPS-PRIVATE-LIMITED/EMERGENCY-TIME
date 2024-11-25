@extends('layouts.app')  

@section('content') 
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Patient Registration</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Patients</li>
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
            <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row g-3">
                        <!-- User ID (hidden, taken from auth) -->
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <!-- Image -->
                        <div class="col-md-6">
                            <label for="image" class="form-label">Profile Picture<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <label for="city" class="form-label">City<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>

                        <!-- Country -->
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>

                        <!-- Birth Place -->
                        <div class="col-md-6">
                            <label for="birth_place" class="form-label">Birth Place<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" required>
                        </div>

                        <!-- Identity Number -->
                        <div class="col-md-6">
                            <label for="identity_no" class="form-label">Identity Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="identity_no" name="identity_no" required>
                        </div>

                        <!-- Profile Status -->
                        <div class="col-md-6">
                            <label for="profile_status" class="form-label">Profile Status</label>
                            <select class="form-select" id="profile_status" name="profile_status">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Save Patient</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
@endsection
