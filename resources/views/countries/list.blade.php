@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Countries</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Countries</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Form Column (Left Side) -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Add Country</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="country_code" class="form-label">Country Code</label>
                                <input type="text" class="form-control" id="country_code" name="country_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="country_name" class="form-label">Country Name</label>
                                <input type="text" class="form-control" id="country_name" name="country_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Country Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Country</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- List Column (Right Side) -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                        <h3>Country List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display">
                                <thead>
                                    <tr>
                                        <th>Country Code</th>
                                        <th>Country Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($countries as $country)
                                    <tr>
                                        <td>{{ $country->country_code }}</td>
                                        <td>{{ $country->country_name }}</td>
                                        <td>
                                            <form action="{{ route('countries.destroy', $country->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this country?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $country->id }}" data-code="{{ $country->country_code }}" data-name="{{ $country->country_name }}">Edit</button>
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
                <h5 class="modal-title" id="editModalLabel">Edit Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit_country_code" class="form-label">Country Code</label>
                        <input type="text" class="form-control" id="edit_country_code" name="country_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_country_name" class="form-label">Country Name</label>
                        <input type="text" class="form-control" id="edit_country_name" name="country_name" required>
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
            var countryId = button.getAttribute('data-id');
            var countryCode = button.getAttribute('data-code');
            var countryName = button.getAttribute('data-name');

            // Update form action URL and input values
            var form = document.getElementById('editForm');
            form.action = '/countries/' + countryId;
            document.getElementById('edit_country_code').value = countryCode;
            document.getElementById('edit_country_name').value = countryName;
        });
    });
</script>
@endsection
