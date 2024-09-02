@extends('layouts.AdminConsult-layout')

@section('content')

<link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/HSViewStudent.css') }}">
        
        <h1><center>STUDENT EVALUATION AND CONSULTATION</center></h1>
                <h2>GRADE 10 101</h2>
    
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
                <a href="{{ route('Grade10-101Profile') }}">
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
