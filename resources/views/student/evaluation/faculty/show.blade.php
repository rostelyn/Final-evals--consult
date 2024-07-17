@extends('layouts.evaluation-layout')

@section('content')
<style>
    .btn-custom {
        background-color: #62CB6D;
        border-color: #62CB6D;
        color: white;
    }
    .btn-custom:hover {
        background-color: #52b25d;
        border-color: #52b25d;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">{{ $department }} Department</h2>
            <div class="department-head mb-4 p-3 bg-light rounded">
                <h3>Department Head: {{ $details['head'] }}</h3>
                <a href="{{ route('evaluation-form') }}" class="btn btn-custom mt-2">Evaluate</a>
            </div>
            <div class="row">
                @foreach($details['members'] as $member)
                    <div class="col-md-6 mb-4">
                        <div class="faculty-member p-3 bg-white rounded shadow-sm">
                            <div class="picture mb-3">
                                <!-- Placeholder for picture -->
                            </div>
                            <p>{{ $member }}</p>
                            <a href="{{ route('evaluation-form') }}" class="btn btn-custom mt-2">Evaluate</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
