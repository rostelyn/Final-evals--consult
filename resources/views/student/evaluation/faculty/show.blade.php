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

