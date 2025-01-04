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
                    <p>Your appointment has been successfully approved. Please enter the video session link below.</p>
                </div>

                <!-- Terms and Conditions for Provider -->
                <div class="mt-4">
                    <h6><strong>Terms and Conditions</strong></h6>
                    <p>This appointment is provided for charity purposes only. We are not charging any fees from the end user. Please make sure the session is conducted accordingly.</p>
                </div>

                <!-- Video Session Button -->
                <div class="mt-4">
                    <h5 class="mb-3">Video Session</h5>
                    <form method="POST" action="{{ route('appointment.approval', $appointment->id) }}">
                        @csrf
                        <button type="submit" name="appointment_medium" value="video_session" class="btn btn-primary">Approve</button>
                    </form>
                </div>

                <!-- Form for entering the session link -->
                <div class="mt-4" id="linkForm" style="width: 40%; margin: 0 auto;">
                    <p><strong>Enter the link for the video session:</strong></p>
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="video_session_input">Video Session Link</label>
                            <input type="url" class="form-control" id="video_session_input" name="video_session_input" placeholder="Enter video session link">
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-success">Save Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
