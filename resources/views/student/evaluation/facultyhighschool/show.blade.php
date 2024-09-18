@extends('hslayout.HsSidebar-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Student/facultyhighschool.css') }}">

<div class="hsfaculty-page">

    <div class="header">
        <h2>{{ $departmenthighschool }} </h2>
    </div>

    <div class="hsfaculty-head">
        <div class="hsfaculty-picture"></div>
        <p>High School Department Head: {{ $highschooldetails['head'] }}</p>
        <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
    </div>

    <div class="hsfaculty-list">
        @foreach($highschooldetails['members'] as $member)
            <div class="hsfaculty-member">
                <div class="hsfaculty-picture"></div>
                <p>{{ $member }}</p>
                <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
            </div>
        @endforeach
    </div>
</div>

@endsection
