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
                        <a href="javascript:void(0)" class="btn btn-primary" id="googleMeetBtn">Google Meet</a>
                        <a href="javascript:void(0)" class="btn btn-secondary" id="zoomBtn">Zoom</a>
                    </div>

                    <!-- Form and input fields that will change based on button click -->
                    <div class="mt-4" id="linkForm" style="width: 40%; margin: 0 auto;">
                        <!-- Google Meet Field -->
                        <div id="googleMeetField" style="display: none;">
                            <h6 class="mb-3">Enter the Google Meet link:</h6>
                            <form action="#" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="google_meet_input">Google Meet Link</label>
                                    <input type="url" class="form-control" id="google_meet_input" name="google_meet_input" placeholder="Enter Google Meet link">
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-success">Save Link</button>
                                </div>
                            </form>
                        </div>

                        <!-- Zoom Field -->
                        <div id="zoomField" style="display: none;">
                            <h6 class="mb-3">Enter the Zoom link:</h6>
                            <form action="#" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="zoom_input">Zoom Link</label>
                                    <input type="url" class="form-control" id="zoom_input" name="zoom_input" placeholder="Enter Zoom link">
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
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // When Google Meet button is clicked
        document.getElementById('googleMeetBtn').addEventListener('click', function() {
            // Show Google Meet field and hide Zoom field
            document.getElementById('googleMeetField').style.display = 'block';
            document.getElementById('zoomField').style.display = 'none';
        });

        // When Zoom button is clicked
        document.getElementById('zoomBtn').addEventListener('click', function() {
            // Show Zoom field and hide Google Meet field
            document.getElementById('zoomField').style.display = 'block';
            document.getElementById('googleMeetField').style.display = 'none';
        });
    });
</script>
@endsection

@endsection
