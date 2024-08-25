@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtYearPick.css') }}">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSIT YEAR LIST</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('ConsultationBsit101') }}">
                <button>101</button>
            </a>
            <a href="{{('Consult-bsit102') }}">
                <button>102</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('ConsultationBsit201') }}">
                <button>201</button>
            </a>
            <a href="{{('Consult-bsit202') }}">
                <button>202</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('ConsultationBsit301') }}">
                <button>301</button>
            </a>
            <a href="{{('Consult-bsit303') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('ConsultationBsit401') }}">
                <button>401</button>
            </a>
            <a href="{{('Consult-bsit402') }}">
                <button>402</button>
            </a>
        </div>
    </div>
@endsection
