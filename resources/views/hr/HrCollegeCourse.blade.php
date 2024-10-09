<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/coursepick.css') }}">
</head>
<body>

<div class="header">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
</div>

    <h2>COURSE</h2>
<div class="course-container">
    <a href="{{ ('HrBSIT') }}">
        <div class="course-item" data-title="Bachelor of Science in Technology Information">
           <img src="{{ asset('css/CoursePicture/BSIT.jpg') }}">
            <span class="course-name">Bachelor of Science in Technology Information</span>
        </div>
    </a>
      <a href="{{ ('HrHM') }}">
        <div class="course-item" data-title="Bachelor of Science in Hospitality Management">
              <img src="{{ asset('css/CoursePicture/BSHM.jpg') }}">
            <span class="course-name">Bachelor of Science in Hospitality Management</span>
        </div>
      </a>
      <a href="{{ ('HrACT') }}">
        <div class="course-item" data-title="Associate in Computer Technology">
              <img src="{{ asset('css/CoursePicture/ACT.jpg') }}">
            <span class="course-name">Associate in Computer Technology</span>
        </div>
    </a>
    <a href="{{ ('HrHRT') }}">
        <div class="course-item" data-title="Hotel and Restaurant Technology">
              <img src="{{ asset('css/CoursePicture/HRT.jpg') }}">
            <span class="course-name">Hotel and Restaurant Technology</span>
        </div>
    </a>
    <a href="{{ ('HrBSCS') }}">
        <div class="course-item" data-title="Bachelor of Science in Computer Science">
              <img src="{{ asset('css/CoursePicture/COMSCI.jpg') }}">
            <span class="course-name">Bachelor of Science in Computer Science</span>
        </div>
    </a>
    <a href="{{ ('HrCET') }}">
        <div class="course-item" data-title="CET">
             <img src="{{ asset('css/CoursePicture/CET.jpg') }}">
            <span class="course-name">Computer Engineering Technology</span>
        </div>
    </a>
    <a href="{{ ('HrHRS') }}">
        <div class="course-item" data-title="Hotel & Restaurant Services">
             <img src="{{ asset('css/CoursePicture/HRS.jpg') }}">
            <span class="course-name">Hotel & Restaurant Services</span>
        </div>
    </a>
    <a href="{{ ('HrTourism') }}">
        <div class="course-item" data-title="Tourism">
             <img src="{{ asset('css/CoursePicture/TOURISM.jpg') }}">
            <span class="course-name">Tourism</span>
        </div>
    </a>
</div>

<a href="{{ 'HrStudentList' }}">
    <button class="back-button">Back</button>
</a>

</body>
</html>