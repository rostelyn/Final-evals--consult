@extends('layouts.AdminConsult-layout')

@section('content')
<div class="profile-page">
    <div class="profile-header">
        <div class="profile-picture">
            <img src="path/to/student-picture.jpg" alt="Student Picture">
        </div>
        <div class="profile-info">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Outlook:</strong> {{ $student->outlook }}</p>
            <p><strong>Gender:</strong> {{ $student->gender }}</p>
            <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
        </div>
    </div>
    <div class="appointment-history">
        <h3>STUDENT APPOINTMENT HISTORY</h3>
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
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->course_grade_level_section }}</td>
                    <td>{{ $appointment->purpose }}</td>
                    <td>{{ $appointment->meeting_mode }}</td>
                    <td>{{ $appointment->meeting_preference }}</td>
                    <td>{{ $appointment->date_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
