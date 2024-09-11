@extends('layouts.evaluation-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Student/faculty.css') }}">

<div class="faculty-page">

    <div class="header">
        <h2>{{ $department }} Department</h2>
    </div>

    <div class="faculty-head">
        <div class="faculty-picture"></div>
        <p>Department Head: {{ $details['head'] }}</p>
        <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
    </div>

    <div class="faculty-list">
        @foreach($details['members'] as $member)
            <div class="faculty-member">
                <div class="faculty-picture"></div>
                <p>{{ $member }}</p>
                <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
            </div>
        @endforeach
    </div>
</div>


@endsection
