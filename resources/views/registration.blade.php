<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Registration Page</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>STUDENT EVALUATION AND CONSULTATION</h2>
    </div>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="picture-upload">
                <img src="" alt="Profile Picture" id="profile-picture">
                <button type="button" onclick="document.getElementById('picture').click()">UPLOAD</button>
                <input type="file" id="picture" name="picture" style="display: none;">
            </div>

            <label for="student_id">STUDENT ID NO</label>
            <input type="text" id="student_id" name="student_id" required>

            <label for="name">NAME</label>
            <input type="text" id="name" name="name" required>

            <label for="age">AGE</label>
            <input type="text" id="age" name="age" required>

            <label for="OutlookEmail">OUTLOOK EMAIL</label>
            <input type="email" id="OutlookEmail" name="OutlookEmail" required>

            <label for="CourseStrand">COURSE/STRAND</label>
            <input type="text" id="CourseStrand" name="CourseStrand" required>

            <label for="GradeLevelSection">GRADE LEVEL/SECTION</label>
            <input type="text" id="GradeLevelSection" name="GradeLevelSection" required>

            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" required>

            <label for="cfpassword">CONFIRM PASSWORD</label>
            <input type="cfpassword" id="cfpassword" name="cfassword" required>

            <button type="submit">SAVE</button>
            
        </form>
    </div>
</div>

</body>
</html>