<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Profile</title>
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrStudentProfile.css') }}">
</head>
<body>
    <div class="header">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    </div>
    <div class="row">
        <div class="column">
            <div class="picture-box center">
                @if ($student->picture)
                    <img src="{{ asset('images/' . $student->picture) }}" alt="Student Picture" />
                @else
                    <p>No picture available</p>
                @endif
            </div>
            <div class="info">
                <div class="label">{{ $student->name }}</div>
                <div class="label">{{ $student->Outlook_Email }}</div>
            </div>
        </div>
        <div class="column">
            <table class="table">
                <tr>
                    <th>Gender</th>
                    <th>Student Number</th>
                </tr>
                <tr>
                    <td>{{ ucfirst($student->gender) }}</td>
                    <td>{{ $student->StudentId }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="teacher-list h1">
        <h1>LIST OF TEACHERS</h1>
    </div>
    <div class="teacher-list">
        <table class="table">
            <tr>
                <th>Name of Teacher</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>ARIES CAYABYAB</td>
                <td>
                   <a href="{{ route('evaluation.show', ['teacher' => 'ARIES CAYABYAB']) }}">
                     <button type="button">Evaluation History</button>
                   </a>
                </td>
              </tr>
              <tr>
                <td>SIR PERCIAN</td>
                <td>
                    <a href="{{ route('evaluation.show', ['teacher' => 'SIR PERCIAN']) }}">
                       <button type="button">Evaluation History</button>
                    </a>
                </td>
              </tr>
        </table>
    </div>
  </body>
</html>
