<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HSViewStudent.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,Aristotle00;1,300;1,400;1,Aristotle00&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
    <title>Grade 12 Marcus</title>
</head>
<body>
    <div class="header">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    </div>
    <h2>Grade 12-Marcus</h2>

    <table class="bsit-course-student-list">
        <thead>
            <tr>
                <th><center>Name</center></th>
                <th><center>Actions</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>
                        <a href="{{ route('HsProfile', ['id' => $student->StudentId]) }}">
                            <button>VIEW STUDENT</button>
                        </a>
                    </td>
                </tr>
            @endforeach

            @if($students->isEmpty())
                <tr>
                    <td colspan="2"><center>No students found</center></td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
