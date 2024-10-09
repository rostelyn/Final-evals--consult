<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registration</h1>

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

            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" id="student_id" value="{{ old('student_id') }}" required>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" name="age" id="age" value="{{ old('age') }}" required>
            </div>

            <div class="form-group">
                <label for="outlook_email">Outlook Email:</label>
                <input type="email" name="outlook_email" id="outlook_email" value="{{ old('outlook_email') }}" required>
            </div>

            <div class="form-group">
                <label for="course_strand">Course Strand:</label>
                <input type="text" name="course_strand" id="course_strand" value="{{ old('course_strand') }}" required>
            </div>

            <div class="form-group">
                <label for="grade_level_section">Grade Level Section:</label>
                <input type="text" name="grade_level_section" id="grade_level_section" value="{{ old('grade_level_section') }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
    <div class="profile-container">
        <img src="/path/to/default-profile.jpg" id="profile-preview">
        <h2>1X1 Picture</h2>

        <button class="upload-button" id="upload-button">Choose Picture</button>
        
        <input type="file" name="picture" id="picture" accept="image/*">
    </div>

    <script>
        const pictureInput = document.getElementById('picture');
        const profilePreview = document.getElementById('profile-preview');
        const uploadButton = document.getElementById('upload-button');
        uploadButton.addEventListener('click', function() {
            pictureInput.click();
        });

        pictureInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
