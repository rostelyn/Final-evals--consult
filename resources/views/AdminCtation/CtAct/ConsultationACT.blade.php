@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtYearPick.css') }}">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>ACT YEAR LIST</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('ACT101') }}">
                <button>101</button>
            </a>
            <a href="{{('ACT102') }}">
                <button>102</button>
            </a>
            <a href="{{('ACT103') }}">
                <button>103</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('ACT201') }}">
                <button>201</button>
            </a>
            <a href="{{('ACT202') }}">
                <button>202</button>
            </a>
            <a href="{{('ACT203') }}">
                <button>203</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('ACT301') }}">
                <button>301</button>
            </a>
            <a href="{{('ACT302') }}">
                <button>302</button>
            </a>
            <a href="{{('ACT303') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('ACT401') }}">
                <button>401</button>
            </a>
            <a href="{{('ACT402') }}">
                <button>402</button>
            </a>
            <a href="{{('ACT403') }}">
                <button>403</button>
            </a>
        </div>
    </div>
@endsection
