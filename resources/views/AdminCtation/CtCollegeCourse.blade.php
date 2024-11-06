@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtCollegeCourse.css') }}">

    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>COURSES</h2>
    <div class="course-container">
    <a href="{{ route('ConsultationBSITCourse') }}">
            <button class="button">
                Bachelor of Science and Technology Information
            </button>   
        </a>
        <a href="ConsultationBSHMCourse">
            <button>
            Bachelor of Science and Hospitality Management
            </button>
        </a>
        <a href="ConsultationACT">
            <button>
             Associate in Computer Technology
            </button>
        </a>
        <a href="ConsultationHRT">
            <button>
            Hotel and Restaurant Technology
            </button>
        </a>
        <a href="#">
            <button>
            Bachelor of Science in Computer Science
            </button>
        </a>
        <a href="ConsultationCET">
            <button>
                Computer Engineering Technology
            </button>
        </a>
        <a href="#">
            <button>
            Hotel & Restaurant Services
            </button>
        </a>
        <a href="#">
            <button>
                TOURISM
            </button>
        </a>
    </div>
@endsection
