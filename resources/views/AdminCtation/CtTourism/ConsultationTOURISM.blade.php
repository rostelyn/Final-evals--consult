@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtYearPick.css') }}">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>TOURISM YEAR LIST</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('Tourism101') }}">
                <button>101</button>
            </a>
            <a href="{{('Tourism102') }}">
                <button>102</button>
            </a>
            <a href="{{('Tourism103') }}">
                <button>103</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('Tourism201') }}">
                <button>201</button>
            </a>
            <a href="{{('Tourism202') }}">
                <button>202</button>
            </a>
            <a href="{{('Tourism203') }}">
                <button>203</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('Tourism301') }}">
                <button>301</button>
            </a>
            <a href="{{('Tourism302') }}">
                <button>302</button>
            </a>
            <a href="{{('Tourism303') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('Tourism401') }}">
                <button>401</button>
            </a>
            <a href="{{('Tourism402') }}">
                <button>402</button>
            </a>
            <a href="{{('Tourism403') }}">
                <button>403</button>
            </a>
        </div>
    </div>
@endsection
