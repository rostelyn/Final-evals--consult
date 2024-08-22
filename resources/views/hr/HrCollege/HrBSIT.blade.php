@extends('layouts.HrLayout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrYearList.css') }}">

     <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h1>BSIT YEAR LIST</h1>
    <div>
        
        <a href="{{('HrBSIT101') }}">
        <h2 class="year">1st year</h2>
            <button>BSIT 101</button>
        </a>
        <a href="{{('HrBSIT201') }}">
        <h2 class="year">2nd year</h2>
            <button>BSIT 201</button>
        </a>
        <a href="{{('HrBSIT301') }}">
        <h2 class="year">3rd year</h2>
            <button>BSIT 301</button>
        </a>

        <a href="{{('HrBSIT401') }}">
        <h2 class="year">4th year</h2>
            <button>BSIT 401</button>
        </a>
    </div>

    @endsection