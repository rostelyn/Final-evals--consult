
@extends('layouts.AdminConsult-layout')

@section('content')
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>GRADE 12 STRAND</h2>
    <div>
        
        <a href="{{('CTHS-G12abm') }}">
        <h2 class=></h2>
            <button>ABM</button>
        </a>
        <a href="{{('CTHS-G12stem') }}">
        <h2 class=></h2>
            <button>STEM</button>
        </a>
        <a href="{{('CTHS-G12gas') }}">
        <h2 class=></h2>
            <button>GAS</button>
        </a>
        <a href="{{('CTHS-G12ict') }}">
        <h2 class=></h2>
            <button>ICT</button>
        </a>
    </div>
@endsection
