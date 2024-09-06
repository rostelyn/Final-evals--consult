@extends('layouts.AdminConsult-layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/HSViewStudent.css') }}">

<h1><center>STUDENT EVALUATION AND CONSULTATION</center></h1>
<h2>GRADE 11 STEM</h2>

<table class="bsit-course-student-list">
    <thead>
        <tr>
            <th><center>No.</center></th>
            <th><center>Name</center></th>
            <th><center>Actions</center></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><center>1</center></td>
            <td><center>John Doe</center></td>
            <td><center>
                 <a href="{{ route('GRADE11STEM') }}">
                    <button>VIEW STUDENT</button>
                </a>
            </center></td>
        </tr>
        <tr>
            <td><center>2</center></td>
            <td><center>Jane Smith</center></td>
            <td><center>
                <a href="#">
                    <button>VIEW STUDENT</button>
                </a>
            </center></td>
        </tr>
        <tr>
            <td><center>3</center></td>
            <td><center>Emily Johnson</center></td>
            <td><center>
                <a href="#">
                    <button>VIEW STUDENT</button>
                </a>
            </center></td>
        </tr>
    </tbody>
</table>

@endsection
