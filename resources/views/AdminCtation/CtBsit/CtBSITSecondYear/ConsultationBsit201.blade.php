<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CTViewStudent.css') }}">
    <title>BSIT 201 Students</title>
</head>
<body>
    <div class="header">
        <h1>Student Evaluation and Consultation</h1>
    </div>

    <h2>BSIT 201</h2>

    <table class="student-list">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $index => $student)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                        <a href="{{ route('student.show', ['id' => $student->StudentId]) }}">
                            <button>View Student</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
