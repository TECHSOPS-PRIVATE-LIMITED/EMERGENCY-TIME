@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Plans</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item active">Plans</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header pb-0 card-no-border">
                <h3>Subscription Plans</h3>
                <a href="{{ route('plans.create') }}" class="btn btn-secondary float-end">Add Plan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Validity Date</th>
                                <th>Appointments</th>
                                <th>AI Bot</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plans as $plan)
                            <tr>
                                <td>{{ $plan->plan_name }}</td>
                                <td>{{ $plan->duration }}</td>
                                <td>{{ $plan->price }}</td>
                                <td>{{ $plan->discount }}</td>
                                <td>{{ $plan->discount_date }}</td>
                                <td>{{ $plan->number_appointments }}</td>
                                <td>{{ $plan->ai_bot }}</td>
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
@endsection
