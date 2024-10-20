<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrViewStudent.css') }}">
    
    <title>BSIT 101 Students</title>
</head>
<body>
    <div class="header">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    </div>
    <h2>BSIT 101</h2>

    <table class="bsit-course-student-list">
        <thead>
            <tr>
                <th><center>No.</center></th>
                <th><center>Name</center></th>
                <th><center>Actions</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $index => $student)
                @if($student->Course_Strand === 'BSIT' && $student->Grade_Level_Section === '101')
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- This will add the serial number -->
                        <td>{{ $student->name }}</td>
                        <td>
                            <a href="{{ route('student.show', ['id' => $student->StudentId]) }}">
                                <button>VIEW STUDENT</button>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
