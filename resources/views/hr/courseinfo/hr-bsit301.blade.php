@extends('layouts.hr-layout')

@section('content')
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSIT 301</h2>
    <div>
        <p>Escat Denn Harenz F.</p>
        <a href="{{ ('hr-profile') }}">
            <button>VIEW STUDENT</button>
        </a>
    </div>
    <div>
        <p>Abundia Rostelyn Jane S.</p>
        <a href="{{ route('hr-profile') }}">
            <button>VIEW STUDENT</button>
        </a>
    </div>
    <div>
        <p>Peralta Karl Allan E.</p>
        <a href="{{ route('hr-profile') }}">
            <button>VIEW STUDENT</button>
        </a>
    </div>
@endsection
