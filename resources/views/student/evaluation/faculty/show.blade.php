@extends('layouts.evaluation-layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">{{ $department }} Department</h2>
            <div class="department-head faculty-container">
                <div class="picture mb-3">
                    <!-- Placeholder for picture -->
                </div>
                <h3>Department Head: {{ $details['head'] }}</h3>
                <a href="{{ route('evaluation-form') }}" class="btn btn-custom mt-2">Evaluate</a>
            </div>
            <div class="row justify-content-center">
                @foreach($details['members'] as $member)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="faculty-container">
                            <div class="faculty-member">
                                <div class="picture"></div>
                                <p>{{ $member }}</p>
                                <a href="{{ route('evaluation-form') }}" class="btn btn-custom mt-2">Evaluate</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>


</style>
@endsection
