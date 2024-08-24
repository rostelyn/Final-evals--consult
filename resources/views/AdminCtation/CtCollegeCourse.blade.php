@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtCollegeCourse.css') }}">

    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>COURSES</h2>
    <div class="course-container">
    <a href="{{ route('Consult-bsit') }}">
            <button class="button">
                Bachelor of Science and Technology Information
            </button>   
        </a>
        <a href="#">
            <button>
            Bachelor of Science and Hospitality Management
            </button>
        </a>
        <a href="#">
            <button>
             Associate in Computer Technology
            </button>
        </a>
        <a href="#">
            <button>
                HRT
            </button>
        </a>
        <a href="#">
            <button>
                BSCS
            </button>
        </a>
        <a href="#">
            <button>
                CET
            </button>
        </a>
        <a href="#">
            <button>
                HRS
            </button>
        </a>
        <a href="#">
            <button>
                TOURISM
            </button>
        </a>
    </div>
@endsection
