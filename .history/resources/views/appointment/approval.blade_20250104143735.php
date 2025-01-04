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
                        <h6 id="linkHeading" class="mb-3">Enter the Google Meet link:</h6>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="link_input" id="linkLabel">Google Meet Link</label>
                                <input type="url" class="form-control" id="link_input" name="link_input" placeholder="Enter Google Meet link">
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

@section('scripts')
<script>
    // Wait until the document is fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // When Google Meet button is clicked
        document.getElementById('googleMeetBtn').addEventListener('click', function() {
            document.getElementById('linkHeading').innerText = 'Enter the Google Meet link:';
            document.getElementById('linkLabel').innerText = 'Google Meet Link';
            document.getElementById('link_input').placeholder = 'Enter Google Meet link';
        });

        // When Zoom button is clicked
        document.getElementById('zoomBtn').addEventListener('click', function() {
            document.getElementById('linkHeading').innerText = 'Enter the Zoom link:';
            document.getElementById('linkLabel').innerText = 'Zoom Link';
            document.getElementById('link_input').placeholder = 'Enter Zoom link';
        });
    });
</script>
@endsection

@endsection
