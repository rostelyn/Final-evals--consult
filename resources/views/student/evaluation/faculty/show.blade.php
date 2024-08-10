@extends('layouts.evaluation-layout')

@section('content')

<div class="container-fluid px-4">
    <!-- Department Head Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="mb-4">{{ $department }} Department</h2>
            <div class="department-head faculty-container mb-4">
                <div class="picture mb-3 mx-auto" style="width: 150px; height: 150px; background-color: #d3d3d3;">
                    <!-- Placeholder for picture -->
                </div>
                <h3 class="mb-3">Department Head: {{ $details['head'] }}</h3>
                <a href="{{ route('evaluation-form') }}" class="btn btn-custom mt-2">Evaluate</a>
            </div>
        </div>
    </div>

    <!-- Department Members Section -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($details['members'] as $member)
            <div class="col">
                <div class="faculty-container">
                    <div class="picture mb-3 mx-auto" style="width: 100px; height: 100px; background-color: #d3d3d3;">
                        <!-- Placeholder for picture -->
                    </div>
                    <p class="mb-2">{{ $member }}</p>
                    <a href="{{ route('evaluation-form') }}" class="btn btn-custom">Evaluate</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .faculty-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        height: 100%; /* Maximizes height of each item within its column */
        max-width: 100%; /* Ensures it does not exceed the container width */
    }

    .btn-custom {
        background-color: #4BC0C0;
        color: #fff;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 1rem;
    }

    .btn-custom:hover {
        background-color: #3aa8a8;
    }

    .picture {
        border-radius: 50%;
    }

    .text-center {
        text-align: center;
    }

    .container-fluid {
        padding-left: 0;
        padding-right: 0;
    }
</style>

@endsection
