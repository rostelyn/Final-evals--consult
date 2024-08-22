@extends('layouts.HrLayout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrViewStudent.css') }}">
        
    <h1><center>STUDENT EVALUATION AND CONSULTATION</center></h1>
            <h2>BSIT 101</h2>

<table class="bsit-course-student-list">
    <thead>
        <tr>
    
            <th><center>Name</center></th>
            <th><center>Actions</center></th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>STUDENT NAME</td>
            <td>
                <a href="#">
                    <button>VIEW STUDENT</button>
                </a>
            </td>
        </tr>
        <tr>
            <td>STUDENT NAME</td>
            <td>
                <a href="#">
                    <button>VIEW STUDENT</button>
                </a>
            </td>
        </tr>
        <tr>
            <td>STUDENT NAME</td>
            <td>
                <a href="#">
                    <button>VIEW STUDENT</button>
                </a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
