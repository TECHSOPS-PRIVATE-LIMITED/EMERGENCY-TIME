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
                            <div class="mb-3">
                                <label for="country_id" class="form-label">Country</label>
                                <select class="form-control" id="country_id" name="country_id" required>
                                    <option value="" disabled selected>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
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
                                        <th>Country</th> <!-- Added Country Column -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($specialities as $speciality)
                                    <tr>
                                        <td>{{ $speciality->speciality_name }}</td>
                                        <td>{{ $speciality->country->country_name ?? 'N/A' }}</td> <!-- Display country name -->
                                        <td>
                                            <form action="{{ route('specialities.destroy', $speciality->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this speciality?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $speciality->id }}" data-name="{{ $speciality->speciality_name }}">Edit</button>
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Speciality Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit_speciality_name" class="form-label">Speciality Name</label>
                        <input type="text" class="form-control" id="edit_speciality_name" name="speciality_name" required>
                    </div>
                    <div class="mb-3">
                                <label for="speciality_image" class="form-label">Speciality Image</label>
                                <input type="file" class="form-control" id="speciality_image" name="speciality_image" required>
                            </div>
                            <div class="mb-3">
                                <label for="country_id" class="form-label">Country</label>
                                <select class="form-control" id="country_id" name="country_id" required>
                                    <option value="" disabled selected>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var specialityId = button.getAttribute('data-id');
            var specialityName = button.getAttribute('data-name');

            // Update form action URL and input value
            var form = document.getElementById('editForm');
            form.action = '/specialities/' + specialityId;
            document.getElementById('edit_speciality_name').value = specialityName;
        });
    });
</script>
@endsection
