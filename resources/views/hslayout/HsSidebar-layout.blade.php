<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/Hsapp.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
        <img src="{{ asset('css/GeneralResources/hslogo.jpg') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="/student.student-evaluation-consultation">Dashboard</a></li>
            <li><a href="{{ ('HighSchoolCalendar') }}">Student Calendar</a></li>
            <li><a href="HighSchoolSettings">Settings</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="menu-icon" onclick="toggleSidebar()">☰</div>
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            $('#sidebar').toggleClass('collapsed');
        }
    </script>
</body>
</html>
