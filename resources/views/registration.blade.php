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
        <form action="{{ route('student.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group picture-upload">
                <label for="picture">PICTURES</label>
                <div class="picture-box">1X1</div>
                <input type="file" id="picture" name="picture">
            </div>
            <div class="form-group">
                <label for="student-id">STUDENT ID NO</label>
                <input type="text" id="student-id" name="student_id">
            </div>
            <div class="form-group">
                <label for="name">NAME</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="age">AGE</label>
                <input type="text" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="email">OUTLOOK EMAIL</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="course">COURSE/STRAND</label>
                <input type="text" id="course" name="course">
            </div>
            <div class="form-group">
                <label for="grade">GRADE LEVEL/SECTION</label>
                <input type="text" id="grade" name="grade">
            </div>
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm-password">CONFIRM PASSWORD</label>
                <input type="password" id="confirm-password" name="confirm_password">
            </div>
            <button type="submit" class="save-btn">SUBMIT</button>
        </form>
    </div>
</body>
</html>
