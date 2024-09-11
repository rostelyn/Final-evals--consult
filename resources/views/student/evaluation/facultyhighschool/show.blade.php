@extends('layouts.evaluation-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Student/facultyhighschool.css') }}">

<div class="facultyhighschool-page">

    <div class="header">
        <h2>{{ $departmenthighschool }} </h2>
    </div>

    <div class="facultyhighschool-head">
        <div class="facultyhighschool-picture"></div>
        <p>Departmenthighschool Head: {{ $highschooldetails['head'] }}</p>
        <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
    </div>

    <div class="facultyhighschool-list">
        @foreach($highschooldetails['members'] as $member)
            <div class="facultyhighschool-member">
                <div class="facultyhighschool-picture"></div>
                <p>{{ $member }}</p>
                <a href="{{ route('evaluation-form') }}" class="btn-evaluate">Evaluate</a>
            </div>
        @endforeach
    </div>
</div>

@endsection
