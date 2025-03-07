@extends('clientside.layouts.app')
@section('clientside')
<div class="tab-pane fade show active" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
    <div class="row">
       
        <div class="col-xxl-4 col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary fw-bold">{{ $plan->name }}</h5>
                    <p class="card-text">Duration: <strong>{{ $plan->duration }}</strong></p>
                    <p class="card-text">Price: <strong>${{ $plan->price }}</strong></p>
                    <p class="card-text"></p>
                    <a href="{{ route('subscribe', $plan->id) }}" class="btn btn-primary w-100">Subscribe</a>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
