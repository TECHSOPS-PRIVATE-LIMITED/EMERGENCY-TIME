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
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display">
                        <thead>
                            <tr>
                                <th>SR/th>
                                <th>Patient Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $provider->full_name }}</td>
                                <td>{{ $provider->speciality->speciality_name }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>{{ $provider->phone_number }}</td>
                                <td>{{ $provider->license_number }}</td>
                                <td>{{ $provider->license_authority }}</td>
                                <td>{{ $provider->license_expiry }}</td>
                                <td>
                                    <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this plan?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
