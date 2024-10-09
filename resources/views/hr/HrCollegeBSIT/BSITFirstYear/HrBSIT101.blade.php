<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSIT 101 Students</title>
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrViewStudent.css') }}">
</head>
<body>
   
    <div class="header">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
     </div>
            <h2>BSIT 101</h2>

<table class="bsit-course-student-list">
    <thead>
        <tr>
            <th><center>Name</center></th>
            <th><center>Actions</center></th>
        </tr>
    </thead>
    <tbody>
            @foreach($students as $student)
                @if($student->Course_Strand === 'BSIT' && $student->Grade_Level_Section === '101')
                    <tr>
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


