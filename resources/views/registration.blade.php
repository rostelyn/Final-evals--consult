<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Register as a Student</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" id="student_id" value="{{ old('student_id') }}" required>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="{{ old('age') }}" required>

        <label for="outlook_email">Outlook Email:</label>
        <input type="email" name="outlook_email" id="outlook_email" value="{{ old('outlook_email') }}" required>

        <label for="course_strand">Course Strand:</label>
        <input type="text" name="course_strand" id="course_strand" value="{{ old('course_strand') }}" required>

        <label for="grade_level_section">Grade Level Section:</label>
        <input type="text" name="grade_level_section" id="grade_level_section" value="{{ old('grade_level_section') }}" required>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <label for="picture">Profile Picture (optional):</label>
        <input type="file" name="picture" id="picture" accept="image/*">

        <button type="submit">Register</button>
    </form>
</body>
</html>
