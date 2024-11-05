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
                            <!-- Other fields in Personal Information -->
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
                            <!-- Other fields in Professional Information -->
                        </div>

                        <!-- Consultation Details Section -->
                        <h3>Consultation Details</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="consultation_days" class="form-label">Consultation Days</label>
                                <input type="text" class="form-control" id="consultation_days" name="consultation_days">
                            </div>
                            <!-- Other fields in Consultation Details -->
                        </div>

                        <!-- Bank Information Section -->
                        <h3>Bank Information</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name">
                            </div>
                            <!-- Other fields in Bank Information -->
                        </div>

                        <!-- Status Section -->
                        <h3>Status & Others</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <!-- Other fields in Status -->
                        </div>

                        <!-- Submit Button -->
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
