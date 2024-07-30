@extends('layouts.AdminConsult-layout')

@section('content')
<div class="student-profile">
    <div class="profile-header">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
        <div class="student-info">
            <div class="picture">1x1 picture</div>
            <div class="details">
                <p>Name: [NAME]</p>
                <p>Gender: Male</p>
                <p>Student Number: 00-0000</p>
            </div>
        </div>
    </div>
    <div class="appointment-history">
        <h2>APPOINTMENT HISTORY</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Course/Grade Level/Section</th>
                    <th>Purpose</th>
                    <th>Meeting Mode</th>
                    <th>Meeting Preference</th>
                    <th>Date/Time</th>
                </tr>
            </thead>
            <tbody>
                <!-- Appointment records go here -->
            </tbody>
        </table>
    </div>
</div>
@endsection
