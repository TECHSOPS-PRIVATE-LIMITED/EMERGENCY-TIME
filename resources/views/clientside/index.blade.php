@extends('clientside.layouts.app')
@section('clientside')
<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .card {
        width: calc(33.33% - 20px);
        background: linear-gradient(45deg, #4e73df, #2e59d9);
        color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.3);
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 2rem;
        font-weight: bold;
    }

    .percent-indicator {
        font-size: 0.9rem;
        font-weight: 600;
    }

    .graph-container {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-top: 30px;
    }


    </style>
<div class="container-fluid">
    <div class="card-container">

        <div class="card" style="background: linear-gradient(45deg, #4e73df, #2e59d9);">
            <h5 class="card-title">Total Appointments</h5>
            <p class="card-text">150</p>
            <div class="percent-indicator">+12% since last month</div>
        </div>

        <div class="card" style="background: linear-gradient(45deg, #1cc88a, #0ca678);">
            <h5 class="card-title">Active Appointments</h5>
            <p class="card-text">120</p>
            <div class="percent-indicator">+8% since last month</div>
        </div>

        <div class="card" style="background: linear-gradient(45deg, #f6c23e, #f4b619);">
            <h5 class="card-title">Inactive Appointments</h5>
            <p class="card-text">30</p>
            <div class="percent-indicator">-3% since last month</div>
        </div>

        <div class="card" style="background: linear-gradient(45deg, #36b9cc, #258391);">
            <h5 class="card-title">Total Chat History</h5>
            <p class="card-text">500</p>
            <div class="percent-indicator">+25% since last month</div>
        </div>

        <div class="card" style="background: linear-gradient(45deg, #e74a3b, #d52a1a);">
            <h5 class="card-title">Others</h5>
            <p class="card-text">75</p>
            <div class="percent-indicator">+5% since last month</div>
        </div>

        <div class="card" style="background: linear-gradient(45deg, #858796, #6e707e);">
            <h5 class="card-title">Pending Actions</h5>
            <p class="card-text">28</p>
            <div class="percent-indicator">-2% since last month</div>
        </div>
    </div>


</div>

@endsection

