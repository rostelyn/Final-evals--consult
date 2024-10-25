@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtYearPick.css') }}">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSHM YEAR LIST</h2>
    <div class="year-container">
        <div class="year-block">
            <h2>First Year</h2>
            <a href="{{('BSHM101') }}">
                <button>101</button>
            </a>
            <a href="{{('BSHM102') }}">
                <button>102</button>
            </a>
            <a href="{{('BSHM103') }}">
                <button>103</button>
            </a>
            
        </div>
        <div class="year-block">
            <h2>Second Year</h2>
            <a href="{{('BSHM201') }}">
                <button>201</button>
            </a>
            <a href="{{('BSHM202') }}">
                <button>202</button>
            </a>
            <a href="{{('BSHM203') }}">
                <button>203</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Third Year</h2>
            <a href="{{('BSHM301') }}">
                <button>301</button>
            </a>
            <a href="{{('BSHM302') }}">
                <button>302</button>
            </a>
            <a href="{{('BSHM303') }}">
                <button>303</button>
            </a>
        </div>
        <div class="year-block">
            <h2>Fourth Year</h2>
            <a href="{{('BSHM401') }}">
                <button>401</button>
            </a>
            <a href="{{('BSHM402') }}">
                <button>402</button>
            </a>
            <a href="{{('BSHM403') }}">
                <button>403</button>
            </a>
        </div>
    </div>
@endsection
