@extends('layouts.hr-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/Hmstudentprofile.css') }}">

</head>
<body>
    <h2>STUDENT EVALUATION AND CONSULTATION</h2>
    <body>
        <div class="row">
            <div class="column">
                <div class="picture-box center">1x1 picture</div>
                <div class="info">
                    <div class="label">DENN MARENZ ESCAT</div>
                    <div>dennHarenz@outlook.com</div>
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
         <h2>LIST OF TEACHERS</h2>
    <div class="teacher-list">
       
        <div class="column">
                <table class="table">
                    <tr>
                        <th>Name of teacher</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>ARIES CAYABYAB</td>
                        <td>
                        <button class="current-evaluation">Current Evaluation</button>
                        <button class="past-evaluation">Past Evaluation</button>
                    </td>
                    </td>
                    </tr>
                    <tr>
                        <td>SIR PERCIAN</td>       
                      <td>
                        <button class="current-evaluation">Current Evaluation</button>
                        <button class="past-evaluation">Past Evaluation</button>
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    
    </div>
</body>
</html>
@endsection