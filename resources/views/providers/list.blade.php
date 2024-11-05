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
                <a href="{{ route('providers.create') }}" class="btn btn-secondary float-end">Enroll Provider</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display">
                        <thead>
                            <tr>
                                <th>Provider Name</th>
                                <th>Speciality</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>License Number</th>
                                <th>License Authority</th>
                                <th>License Expiry</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($providers as $provider)
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
