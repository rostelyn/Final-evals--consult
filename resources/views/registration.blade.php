<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="form-container">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
        
        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ url('/registration') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group picture-upload">
                <label for="picture">PICTURES</label>
                <div class="picture-box">1X1</div>
                <input type="file" id="picture" name="picture">
                @error('picture')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="student-id">STUDENT ID NO</label>
                <input type="text" id="student-id" name="student_id">
                @error('student_id')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">NAME</label>
                <input type="text" id="name" name="name">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="age">AGE</label>
                <input type="text" id="age" name="age">
                @error('age')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">OUTLOOK EMAIL</label>
                <input type="email" id="email" name="email">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="course">COURSE/STRAND</label>
                <input type="text" id="course" name="course">
                @error('course')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="grade">GRADE LEVEL/SECTION</label>
                <input type="text" id="grade" name="grade">
                @error('grade')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirm-password">CONFIRM PASSWORD</label>
                <input type="password" id="confirm-password" name="password_confirmation">
                @error('password_confirmation')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <button type="button" class="back-btn" onclick="history.back()">BACK</button>
            <button type="submit" class="save-btn">SUBMIT</button>

        </form>
    </div>
</body>
</html>
