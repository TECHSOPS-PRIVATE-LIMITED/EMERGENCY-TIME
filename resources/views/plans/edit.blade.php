@extends('layouts.app')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <h2>Edit Plan</h2>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Edit Plan</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('plans.update', $plan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="plan_name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="plan_name" name="plan_name" value="{{ $plan->plan_name }}" required />
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $plan->duration }}" required />
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $plan->price }}" required />
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" class="form-control" id="discount" name="discount" value="{{ $plan->discount }}" />
                    </div>
                    <div class="mb-3">
                        <label for="discount_date" class="form-label">Discount Date</label>
                        <input type="date" class="form-control" id="discount_date" name="discount_date" value="{{ $plan->discount_date }}" />
                    </div>
                    <div class="mb-3">
                        <label for="number_appointments" class="form-label">Number of Appointments</label>
                        <input type="number" class="form-control" id="number_appointments" name="number_appointments" value="{{ $plan->number_appointments }}" required />
                    </div>
                    <div class="mb-3">
                        <label for="ai_bot" class="form-label">AI Bot</label>
                        <input type="text" class="form-control" id="ai_bot" name="ai_bot" value="{{ $plan->ai_bot }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Update Plan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
