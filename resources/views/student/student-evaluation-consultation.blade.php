<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/studentdb.css') }}">
    <title>Student Evaluation and Consultation</title>
</head>
<body>

<div class="main">
    <header class="header">
        <h1>Student Evaluation and Consultation</h1>
    </header>
    <div class="details">
        <table class="details-table">
            <tr>
                <td>Gender</td>
                <td><strong>Male</strong></td>
            </tr>
            <tr>
                <td>Course/Strand</td>
                <td><strong>BSIT</strong></td>
            </tr>
            <tr>
                <td>Student Number</td>
                <td><strong>21-1111</strong></td>
            </tr>
        </table>
    </div>
    <div class="content">
        <div class="profile">
            <div class="picture-box">
                <img src="{{ asset('css/resources/pic.jpg') }}" alt="Profile Picture">
            </div>
            <div class="info">
                <p><strong>DENN HARENZ ESCAT</strong></p>
                
            </div>
        </div>
        <div class="tabs">
            <a href="{{ route('evaluation') }}">Evaluation</a>
            <a href="{{ route('consultation') }}">Consultation</a>
        </div>
    </div>
</div>

</body>
</html>
