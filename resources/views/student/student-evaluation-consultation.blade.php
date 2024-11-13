<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/Student/studentdb.css') }}">
</head>
<body class="{{ $student->level === 'College' ? 'college-bg' : 'highschool-bg' }}">
    <div class="header">
        <p><strong>Username:</strong> {{ ucfirst($student->username) }}</p>
        <h1>Welcome, {{ $student->name }}</h1>
    </div>
     
    <div class="student-profile">
        <div class="student-info">
            <div class="student-photo">
                <img src="{{ asset('images/' . $student->picture) }}" alt="Profile Picture">
            </div>
            <div class="student-details">
                <p><strong>Gender:</strong> {{ ucfirst($student->gender) }}</p>
                <p><strong>Age:</strong> {{ $student->age }} Years Old</p>
                <p><strong>Outlook:</strong> {{ $student->Outlook_Email }}</p>
                <p><strong>Course/Strand:</strong> {{ $student->Course_Strand }}</p>
                <p><strong>Section:</strong> {{ $student->Grade_Level_Section }}</p>
                <p><strong>Student Number:</strong> {{ $student->StudentId }}</p>
            </div>
            <a href="{{ route('logout') }}"><h5>Log Out</a>
        </div>
        <div class="tabs">
            <a href="{{ route('StudentPickEvaluation') }}">Evaluation</a>
            <a href="{{ route('StudentPickConsultation') }}">Consultation</a>
        </div>
    </div>
</body>
</html>
