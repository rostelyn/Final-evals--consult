@extends('hslayout.CTAdmin-layout')

@section('content')
<head>
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/HSProfile.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">

    
</head>
<body>
    <h2>STUDENT EVALUATION AND CONSULTATION</h2>

    <div class="row">
        <div class="column">
            <div class="picture-box center">1x1 picture</div>
    </div>

    <table class="student-info-table">
        <tr>
            <th class="gender">Gender</th>
            <th class="student-number">Student Number</th>
        </tr>
        <tr>
            <td class="gender">Male</td>
            <td class="student-number">21-1111</td>
        </tr>
    </table>

    <h2>APPOINTMENT HISTORY</h2>
    <div class="appointment-history">
        <div class="column">
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Course/Grade Level/Section</th>
                    <th>Purpose of Consultation</th>
                    <th>Select Department Head/Admin</th>
                    <th>Meeting Mode</th>
                    <th>Meeting Preference</th>
                    <th>Date/Time</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Escat Denn Harenz</td>
                    <td>BSIT / 4th Year / 401</td>
                    <td>CS Department</td>
                    <td>Graduating Students</td>
                    <td>Face to Face</td>
                    <td>School</td>
                    <td>07/30/24 10:00 AM</td>
                </tr>
                
            </table>
        </div>
    </div>
</body>
</html>
@endsection
