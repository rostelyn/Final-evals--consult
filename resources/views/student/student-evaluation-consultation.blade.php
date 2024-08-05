<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/studentdb.css') }}">
    <title>Student Evaluation and Consultation</title>

</head>

<body>
    <div class="container">
        <div class="content">
            <div class="sidebar">
                <div class="picture-box">
                    <img src="{{ asset('images/student.jpg') }}" alt="Student Image">
                </div>
                <div class="info">
                    <p><strong>DENN HARENZ ESCAT</strong></p>
                    <p>dennharenz@oulook.com</p>
                </div>
            </div>

            <div class="main">
                <div class="details">
                    <div class="detail-item">Gender<br><strong>Male</strong></div>
                    <div class="detail-item">Course/Strand<br><strong>BSIT</strong></div>
                    <div class="detail-item">Student Number<br><strong>21-1111</strong></div>
                </div>
                <div class="tabs">
                    <a href="{{ route('evaluation') }}">Evaluation</a>
                    <a href="{{ route('consultation') }}">Consultation</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
