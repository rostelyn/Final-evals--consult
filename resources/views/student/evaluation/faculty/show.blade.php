@extends('layouts.evaluation-layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">{{ $department }} Department</h2>
            <div class="department-head mb-4 p-3 bg-light rounded">
                <h3>Department Head: {{ $details['head'] }}</h3>
                <a href="{{ route('evaluation-form') }}" class="btn btn-primary mt-2">Evaluate</a>
            </div>
            <div class="row">
                @foreach($details['members'] as $member)
                    <div class="col-md-6 mb-4">
                        <div class="faculty-member p-3 bg-white rounded shadow-sm">
                            <div class="picture mb-3">
                                <!-- Placeholder for picture -->
                            </div>
                            <p>{{ $member }}</p>
                            <a href="{{ route('evaluation-form') }}" class="btn btn-primary mt-2">Evaluate</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    .container h2 {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
    }
    .department-head {
        background-color: #e9ecef;
        padding: 20px;
        border-radius: 8px;
    }
    .faculty-member {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .faculty-member .picture {
        width: 100%;
        height: 150px;
        background-color: #dee2e6;
        border-radius: 8px;
    }
    .btn-primary {
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
@endpush
