@extends('hslayout.CTAdmin-layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/HSViewStudent.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">


<h1><center>STUDENT EVALUATION AND CONSULTATION</center></h1>
<h2>GRADE 12 ICT</h2>

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
               <a href="{{ route('GRADE12ICT') }}">
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
