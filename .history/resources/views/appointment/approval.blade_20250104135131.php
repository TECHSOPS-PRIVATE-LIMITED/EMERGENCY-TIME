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

                <!-- Appointment Medium Options -->
                <div class="mt-4">
                    <h5 class="mb-3">Choose Appointment Medium</h5>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-primary">Video Call</a>
                        <a href="#" class="btn btn-secondary">Phone Call</a>
                        <a href="#" class="btn btn-info">In-Person</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
