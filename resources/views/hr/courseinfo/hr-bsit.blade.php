<!-- resources/views/hr/courseinfo/hr-bsit.blade.php -->
@extends('layouts.hr-layout')

@section('content')
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>BSIT YEAR LIST</h2>
    <div>
        <a href="{{ route('hr-bsit101') }}">
            <button>1ST YEAR</button>
        </a>
        <a href="#">
            <button>2ND YEAR</button>
        </a>
        <a href="#">
            <button>3RD YEAR</button>
        </a>
        <a href="#">
            <button>4TH YEAR</button>
        </a>
    </div>
@endsection
