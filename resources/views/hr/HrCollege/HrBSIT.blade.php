@extends('layouts.HrLayout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrYearList.css') }}">

    <body>
        
    
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSIT YEAR LIST</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('HrBSIT101') }}">
                <button>101</button>
            </a>
            <a href="{{('') }}">
                <button>102</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('HrBSIT201') }}">
                <button>201</button>
            </a>
            <a href="{{('') }}">
                <button>202</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('HrBSIT301') }}">
                <button>301</button>
            </a>
            <a href="{{('') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('HrBSIT401') }}">
                <button>401</button>
            </a>
            <a href="{{('') }}">
                <button>402</button>
            </a>
        </div>
    </div>
</body>
    @endsection
