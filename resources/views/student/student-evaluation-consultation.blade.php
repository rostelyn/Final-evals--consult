<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation and Consultation</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
        }
        .title {
            font-size: 20px;
            font-style: italic;
        }
        .content {
            display: flex;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 1000px;
            box-sizing: border-box;
            margin-top: 20px;
            border: 1px solid #ccc;
        }
        .sidebar {
            width: 200px;
            margin-right: 20px;
        }
        .sidebar img {
            width: 100%;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        .sidebar .info {
            text-align: center;
            margin-top: 10px;
        }
        .sidebar .info p {
            margin: 5px 0;
            color: #333;
        }
        .sidebar .send-message {
            display: block;
            width: 100%;
            text-align: center;
            background-color: #444;
            color: #fff;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .main {
            flex-grow: 1;
            padding: 20px;
            border-radius: 10px;
            color: #333;
            box-sizing: border-box;
        }
        .main .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            background-color: #007C91;
            padding: 10px;
            border-radius: 10px;
            color: white;
        }
        .main .details .detail-item {
            flex: 1;
            text-align: center;
        }
        .main .tabs {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .main .tabs a {
            background-color: #1FC2BB;
            color: black;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>
                 <ul>
                    @if(auth()->check())
                    <li><a href="{{route('logout')}}">Log Out</a></li>
                    @else
                    <li><a href="{{ route('login') }}">Log In</a></li>
                    <li><a href="{{ route('registration') }}">Register</a></li>
                    @endif
                </ul>
<body>
    <div class="container">
        <div class="content">
            <div class="sidebar">
                <img src="{{ asset('images/student.jpg') }}" alt="Student Image">
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
