@extends('clientside.layouts.app')

@section('clientside')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Advanced BMI Calculator</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('bmi.calculate') }}" class="row g-3">
                        @csrf

                        <div class="col-md-6">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age"
                                   value="{{ old('age', $age ?? '') }}" required min="2" max="120">
                        </div>

                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select gender</option>
                                <option value="male" {{ isset($gender) && $gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ isset($gender) && $gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="unit" class="form-label">Unit System</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="metric" {{ isset($unit) && $unit == 'metric' ? 'selected' : '' }}>Metric (kg, cm)</option>
                                <option value="imperial" {{ isset($unit) && $unit == 'imperial' ? 'selected' : '' }}>Imperial (lb, in)</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight" step="0.01"
                                   value="{{ old('weight', $weight ?? '') }}" required>
                            <small id="weightHelp" class="form-text text-muted">
                                Enter weight in kilograms (metric) or pounds (imperial)
                            </small>
                        </div>

                        <div class="col-md-6">
                            <label for="height" class="form-label">Height</label>
                            <input type="number" class="form-control" id="height" name="height" step="0.01"
                                   value="{{ old('height', $height ?? '') }}" required>
                            <small id="heightHelp" class="form-text text-muted">
                                Enter height in centimeters (metric) or inches (imperial)
                            </small>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Calculate BMI</button>
                        </div>
                    </form>

                    @if(isset($bmi))
                        <div class="mt-4">
                            <div class="alert alert-info">
                                <h4 class="alert-heading">Your BMI Results</h4>
                                <p class="mb-0">BMI: <strong>{{ $bmi }}</strong></p>
                                <p>Category: <strong>{{ $category }}</strong></p>
                            </div>

                            <div class="progress mt-3">
                                @php
                                    if ($bmi < 18.5) {
                                        $progressWidth = ($bmi / 18.5) * 25;
                                        $progressClass = 'bg-warning';
                                    } elseif ($bmi >= 18.5 && $bmi < 25) {
                                        $progressWidth = 25 + (($bmi - 18.5) / 6.5) * 25;
                                        $progressClass = 'bg-success';
                                    } elseif ($bmi >= 25 && $bmi < 30) {
                                        $progressWidth = 50 + (($bmi - 25) / 5) * 25;
                                        $progressClass = 'bg-warning';
                                    } else {
                                        $progressWidth = 75 + min(25, (($bmi - 30) / 10) * 25);
                                        $progressClass = 'bg-danger';
                                    }
                                @endphp
                                <div class="progress-bar {{ $progressClass }}" role="progressbar"
                                     style="width: {{ $progressWidth }}%"
                                     aria-valuenow="{{ $bmi }}" aria-valuemin="0" aria-valuemax="40"></div>
                            </div>

                            <div class="d-flex justify-content-between mt-1">
                                <small>Underweight</small>
                                <small>Normal</small>
                                <small>Overweight</small>
                                <small>Obese</small>
                            </div>

                            <div class="mt-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Ideal Weight Range</h5>
                                        <p class="card-text">Based on your height and gender, your ideal weight range is:
                                            <strong>
                                                {{ $idealWeightLow }} - {{ $idealWeightHigh }}
                                                {{ $unit == 'metric' ? 'kg' : 'lbs' }}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Personalized Health Insights</h5>
                                        <ul class="list-unstyled">
                                            @foreach($healthInsights as $insight)
                                                <li class="mb-2">• {{ $insight }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const unitSelect = document.getElementById('unit');
        const weightHelp = document.getElementById('weightHelp');
        const heightHelp = document.getElementById('heightHelp');

        function updateHelperText() {
            if (unitSelect.value === 'metric') {
                weightHelp.textContent = 'Enter weight in kilograms (metric)';
                heightHelp.textContent = 'Enter height in centimeters (metric)';
            } else {
                weightHelp.textContent = 'Enter weight in pounds (imperial)';
                heightHelp.textContent = 'Enter height in inches (imperial)';
            }
        }

        unitSelect.addEventListener('change', updateHelperText);
        updateHelperText(); // Initial setup
    });
</script>

<style>
    .progress {
        height: 1.5rem;
    }

    .progress-bar {
        transition: width 0.6s ease;
    }
</style>
@endsection
