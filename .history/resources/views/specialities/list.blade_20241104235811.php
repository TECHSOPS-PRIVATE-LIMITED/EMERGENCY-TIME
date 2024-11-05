@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Specialities</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Specialities</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Form Column (Left Side) -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Add Speciality</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('specialities.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="speciality_name" class="form-label">Speciality Name</label>
                                <input type="text" class="form-control" id="speciality_name" name="speciality_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="speciality_image" class="form-label">Speciality Image</label>
                                <input type="file" class="form-control" id="speciality_image" name="speciality_image" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Speciality</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- List Column (Right Side) -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Speciality List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display">
                                <thead>
                                    <tr>
                                        <th>Speciality Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($specialities as $speciality)
                                    <tr>
                                        <td>{{ $speciality->speciality_name }}</td>
                                        <td>
                                        <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this plan?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning">Edit</a>
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
    </div>
</div>
@endsection
