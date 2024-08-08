
@extends('layouts.AdminConsult-layout')

@section('content')
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSIT YEAR LIST</h2>
    <div>
        
        <a href="{{('Consult-bsit101') }}">
        <h2 class=>1st year</h2>
            <button>101</button>
        </a>
        <a href="{{('Consult-bsit201') }}">
        <h2 class=>2nd year</h2>
            <button>201</button>
        </a>
        <a href="{{('Consult-bsit301') }}">
        <h2 class=>3rd year</h2>
            <button>301</button>
        </a>

        <a href="{{('Consult-bsit401') }}">
        <h2 class=>4th year</h2>
            <button>401</button>
        </a>
    </div>
@endsection
