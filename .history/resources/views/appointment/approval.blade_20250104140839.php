@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Appointments</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <!-- Approval Confirmation Message -->
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Appointment Approved!</h4>
                    <p>Your appointment has been successfully approved. Please select the medium for the appointment below.</p>
                </div>

                <div class="mt-4">
    <h5 class="mb-3">Choose Appointment Medium</h5>
    <div class="d-flex justify-content-center gap-3">
        <a href="#" class="btn btn-primary">Google Meet</a> <!-- Google Meet Button -->
        <a href="#" class="btn btn-secondary">Zoom</a> <!-- Zoom Button -->
    </div>

    <!-- Google Meet and Zoom Links Input Fields -->
    <div class="mt-4">
        <h6 class="mb-3">Enter the links for Google Meet or Zoom:</h6>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="google_meet_link">Google Meet Link</label>
                <input type="url" class="form-control" id="google_meet_link" name="google_meet_link" placeholder="Enter Google Meet link">
            </div>
            <div class="form-group mt-3">
                <label for="zoom_link">Zoom Link</label>
                <input type="url" class="form-control" id="zoom_link" name="zoom_link" placeholder="Enter Zoom link">
            </div>
            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-success">Save Links</button>
            </div>
        </form>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
@endsection
