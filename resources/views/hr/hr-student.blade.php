@extends('layouts.hr-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/coursepick.css') }}">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <h2>COURSES</h2>
    <div class="course-container">
          <a href="{{ route('hr-bsit') }}">
            <button>
                BSIT
            </button>
        </a>
        <a href="#">
            <button>
                BSHM
            </button>
        </a>
        <a href="#">
            <button>
                ACT
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