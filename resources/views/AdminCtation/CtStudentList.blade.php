@extends('layouts.AdminConsult-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CTpick.css') }}">
    <title>Student Evaluation and Consultation</title>
</head>
<body>
        <div class="title">Student Evaluation and Consultation</div>
            <div class="container">
                 <div class="courses-container">
            <div class="course-button college" >
            <img class="course-icon" src="{{ asset('css/GeneralResources/logoo.jpg') }}" alt="College Department Icon">
                <div><a href="{{ ('CtCollegeCourse') }}">COLLEGE DEPARTMENT</a></div>    
        </div> 
        <button class="course-button highschool">
        <img class="course-icon" src="{{ asset('css/GeneralResources/hslogo.jpg') }}" alt="High School Icon">
                <div><a href="{{ ('CtHighSchoolSection') }}">HIGH SCHOOL</a></div>
        </button>
             </div>
        </div>
    </div>
</body>
</html>
@endsection
