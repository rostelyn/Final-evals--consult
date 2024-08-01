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
        <form>
            <div class="form-group picture-upload">
                <label for="picture">PICTURES</label>
                <div class="picture-box">1X1</div>
                <input type="file" id="picture">
                <button type="button" class="upload-btn">UPLOAD</button>
            </div>
            <div class="form-group">
                <label for="student-id">STUDENT ID NO</label>
                <input type="text" id="student-id">
            </div>
            <div class="form-group">
                <label for="name">NAME</label>
                <input type="text" id="name">
            </div>
            <div class="form-group">
                <label for="age">AGE</label>
                <input type="text" id="age">
            </div>
            <div class="form-group">
                <label for="email">OUTLOOK EMAIL</label>
                <input type="email" id="email">
            </div>
            <div class="form-group">
                <label for="course">COURSE/STRAND</label>
                <input type="text" id="course">
            </div>
            <div class="form-group">
                <label for="grade">GRADE LEVEL/SECTION</label>
                <input type="text" id="grade">
            </div>
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password">
            </div>
            <div class="form-group">
                <label for="confirm-password">CONFIRM PASSWORD</label>
                <input type="password" id="confirm-password">
            </div>
            <button type="submit" class="save-btn">SAVE</button>
        </form>
    </div>
</body>
</html>
