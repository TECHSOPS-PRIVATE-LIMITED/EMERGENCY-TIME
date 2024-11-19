@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Providers</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Providers</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header pb-0 card-no-border">
                <h3>Providers</h3>
                <a href="{{ route('patients.create') }}" class="btn btn-secondary float-end">Enroll Patients</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Birth Place</th>
                                <th>Identity No</th>
                                <th>Date of Birth</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->city  ?? 'Not Updated'}}</td>
                                <td>{{ $patient->country ?? 'Not Updated' }}</td>
                                <td>{{ $patient->birth_place ?? 'Not Updated' }}</td>
                                <td>{{ $patient->identity_no ?? 'Not Updated' }}</td>
                                <td>{{ $patient->date_of_birth ?? 'Not Updated' }}</td>
                                <td>
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this plan?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
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
