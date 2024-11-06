@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtYearPick.css') }}">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSCS YEAR LIST</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('BSCS101') }}">
                <button>101</button>
            </a>
            <a href="{{('BSCS102') }}">
                <button>102</button>
            </a>
            <a href="{{('BSCS103') }}">
                <button>103</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('BSCS201') }}">
                <button>201</button>
            </a>
            <a href="{{('BSCS202') }}">
                <button>202</button>
            </a>
            <a href="{{('BSCS203') }}">
                <button>203</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('BSCS301') }}">
                <button>301</button>
            </a>
            <a href="{{('BSCS302') }}">
                <button>302</button>
            </a>
            <a href="{{('BSCS303') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('BSCS401') }}">
                <button>401</button>
            </a>
            <a href="{{('BSCS402') }}">
                <button>402</button>
            </a>
            <a href="{{('BSCS403') }}">
                <button>403</button>
            </a>
        </div>
    </div>
@endsection
