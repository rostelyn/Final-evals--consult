@extends('layouts.AdminConsult-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>STUDENT EVALUATION AND CONSULTATION</h2>
    <body>
        <div class="row">
            <div class="column">
                <div class="picture-box center">1x1 picture</div>
                <div class="info">
                    <div class="label">NAME</div>
                    <div>@outlook.com</div>
                </div>
            </div>
            <div class="column">
                <table class="table">
                    <tr>
                        <th>Gender</th>
                        <th>Student Number</th>
                    </tr>
                    <tr>
                        <td>Male</td>
                        <td>21-1111</td>
                    </tr>
                </table>
            </div>
        </div>
         <h2>APPOINTMENT HISTORY</h2>
    <div class="appointment-history">
       
        <div class="column">
                <table class="table">
                    <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Course/Grade Level/Section</th>
                    <th>Purpose</th>
                    <th>Meeting Mode</th>
                    <th>Meeting Preference</th>
                    <th>Date/Time</th>
                </tr>
                    </tr>
                </table>
            </div>
        </div>
    
    </div>
</body>
</html>
@endsection