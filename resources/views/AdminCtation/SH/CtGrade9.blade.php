<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/HSViewStudent.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,900;1,300;1,400;1,900&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
</head>
    <title>Grade 9 Students</title>
</head>
<body>
    <div class="header">
        <h1>Student Evaluation and Consultation</h1>
    </div>

    <h2>Grade 9</h2>

    <table class="ctstudentlist">
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
                        @php
                            // Extracting section from the Grade_Level_Section
                            $section = preg_replace('/Grade\d+/', '', $student->Grade_Level_Section); // Removes GradeXX from the section
                            $studentId = $student->StudentId; // Assuming StudentId is in the correct format (e.g., '20-0000')
                        @endphp

                     <a href="{{ route('highschool.profile', ['section' => 'Grade' . $student->Grade_Level_Section, 'studentId' => $student->StudentId]) }}">
                        <button>View Student</button>
                    </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
