<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="student_id">Student ID</label>
        <input type="text" id="student_id" name="student_id" value="{{ old('student_id') }}" required>
    </div>

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="age">Age</label>
        <input type="number" id="age" name="age" value="{{ old('age') }}" required>
    </div>

    <div>
        <label for="outlook_email">Outlook Email</label>
        <input type="email" id="outlook_email" name="outlook_email" value="{{ old('outlook_email') }}" required>
    </div>

    <div>
        <label for="course_strand">Course Strand</label>
        <input type="text" id="course_strand" name="course_strand" value="{{ old('course_strand') }}" required>
    </div>

    <div>
        <label for="grade_level_section">Grade Level Section</label>
        <input type="text" id="grade_level_section" name="grade_level_section" value="{{ old('grade_level_section') }}" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <div>
        <label for="picture">Profile Picture</label>
        <input type="file" id="picture" name="picture">
    </div>

    <button type="submit">Register</button>
</form>

</body>

</html>
