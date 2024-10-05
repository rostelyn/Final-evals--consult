<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSIT 101 Students</title>
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrViewStudent.css') }}">
</head>
<body>
    
    <h1>BSIT 101 Student List</h1>

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
                <a href="{{ route('student.show', $student->StudentId) }}">
                    <button>VIEW STUDENT</button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
