@extends('layouts.hr-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/pick.css') }}">
    <title>Student EVALUATION AND CONSULTATION</title>
</head>
<body>
    <div class="title">STUDENT EVALUATION AND CONSULTATION</div>
    <div class="main-container">
        <div class="courses-container">
            <button class="course-button college">
                <img class="course-icon" src="{{ asset('css/logoo.jpg') }}" alt="College Department Icon">
                <div>COLLEGE DEPARTMENT</div>
            </button>
            <button class="course-button highschool">
                <img class="course-icon" src="{{ asset('css/hslogo.jpg') }}" alt="High School Icon">
                <div>HIGH SCHOOL</div>
            </button>
        </div>
    </div>
</body>
</html>
@endsection
