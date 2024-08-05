@extends('layouts.hr-layout')

@section('content')
     <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSIT YEAR LIST</h2>
    <div>
        
        <a href="{{('hr-bsit101') }}">
        <h2 class="year">1st year</h2>
            <button>BSIT 101</button>
        </a>
        <a href="{{('hr-bsit201') }}">
        <h2 class="year">2nd year</h2>
            <button>BSIT 201</button>
        </a>
        <a href="{{('hr-bsit301') }}">
        <h2 class="year">3rd year</h2>
            <button>BSIT 301</button>
        </a>

        <a href="{{('hr-bsit401') }}">
        <h2 class="year">4th year</h2>
            <button>BSIT 401</button>
        </a>
    </div>

    @endsection

   
