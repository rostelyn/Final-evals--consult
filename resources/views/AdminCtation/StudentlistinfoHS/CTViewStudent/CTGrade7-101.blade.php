@extends('hslayout.CTAdmin-layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/HSViewStudent.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">

        
        <h1><center>STUDENT EVALUATION AND CONSULTATION</center></h1>
                <h2>GRADE 7 101</h2>
    
    <table class="bsit-course-student-list">
        <thead>
            <tr>
        
                  <th>No.</th>
                  <th>Name</th>
                  <th>Actions</th>
    
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Escat Denn Harenz</td>
                <td>
                   <a href="{{ route('Grade7-101Profile') }}">
                        <button>VIEW STUDENT</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Abundia Rostelyn Jane</td>
                <td>
                    <a href="#">
                        <button>VIEW STUDENT</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Peralta Karl Allan</td>
                <td>
                    <a href="#">
                        <button>VIEW STUDENT</button>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

@endsection