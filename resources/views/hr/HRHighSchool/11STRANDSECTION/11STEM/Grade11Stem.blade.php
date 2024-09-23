@extends('hslayout.HrAdmin-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrStrandSection.css') }}">

    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>11 STEM</h2>
    <div class="button-container">
        <a href="{{ ('11STEM101') }}">
            <button>101</button>
        </a>
        <a href="{{ ('hrProfG11-abm201') }}">
            <button>201</button>
        </a>
        <a href="{{ ('hrProfG11-abm201') }}">
            <button>301</button>
        </a>
    </div>
@endsection
