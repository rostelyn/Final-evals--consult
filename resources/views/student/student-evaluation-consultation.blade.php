<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="{{ asset('css/Student/studentdb.css') }}">
</head>
<body>
    <div class="header">
        <h1>Student Profile</h1>
    </div>
    <div class="student-profile">
        <div class="student-info">
            <div class="student-photo">
                <img src="{{ asset('css/resources/pic.jpg') }}" alt="Profile Picture">
            </div>
            <div class="student-details">
                <h2>Denn Harenz Escat</h2>
                <p>Outlook: dennharenz@outlook.com</p>
                <div class="details">
                    <p><strong>Gender:</strong> Male</p>
                    <p><strong>Course/Strand:</strong> BSIT</p>
                    <p><strong>Section:</strong> 301</p>
                    <p><strong>Student Number:</strong> 21-1111</p>
                </div>
            </div>
        </div>
        <div class="tabs">
            <a href="{{ ('faculty') }}">Evaluation</a>
            <a href="{{ ('consultation') }}">Consultation</a>
        </div>
    </div>
</body>
</html>
