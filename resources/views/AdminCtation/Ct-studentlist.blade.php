@extends('layouts.AdminConsult-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CTpick.css') }}">
    <title>Student Evaluation and Consultation</title>
</head>
<body>
        <div class="title">Student Evaluation and Consultation</div>
            <div class="main-container">
                 <div class="courses-container">
            <div class="course-button college" >
            <img class="course-icon" src="{{ asset('css/GeneralResources/logoo.jpg') }}" alt="College Department Icon">
                <div><a href="{{ ('Ct-student') }}">COLLEGE DEPARTMENT</a></div>    
        </div> 
        <button class="course-button highschool">
        <img class="course-icon" src="{{ asset('css/GeneralResources/hslogo.jpg') }}" alt="High School Icon">
                <div><a href="{{ ('Ct-studentHS') }}">HIGH SCHOOL</a></div>
        </button>
             </div>
        </div>
    </div>
</body>
</html>
@endsection
