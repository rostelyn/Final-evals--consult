@extends('layouts.HrLayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrStudentProfile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>
<body>
<h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <div class="row">
        <div class="column">
            <div class="picture-box center ">1x1 picture</div>
            <div class="info">
                <div class="label">DENN MARENZ ESCAT</div>
                <div class="label">dennHarenz@outlook.com</div>
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
            <div class="teacher-list h1">
              <h1>LIST OF TEACHERS</h1>
            </div>
    <div class="teacher-list">
        <div class="column">
            <table class="table">
                <tr>
                    <th>Name of Teacher</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>ARIES CAYABYAB</td>
                    <td>
                        <button type="button" class="btn btn-primary mr-5">Current Evaluation</button>
                        <button type="button" class="btn btn-warning">Past Evaluation</button>
                    </td>
                </tr>
                <tr>
                    <td>SIR PERCIAN</td>       
                    <td>
                    <button type="button" class="btn btn-primary mr-5">Current Evaluation</button>
                    <button type="button" class="btn btn-warning">Past Evaluation</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
@endsection