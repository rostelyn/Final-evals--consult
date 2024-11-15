<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>HR - Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <h1>HR Admin</h1>
        </div>
        <ul>
            <li><a href="{{('HrAdminDashboard') }}">Dashboard</a></li>
            <li><a href="{{('HrStudentList') }}">Student List</a></li>
            <li><a href="{{('HrCalendar') }}">Calendar</a></li>
            <li><a href="{{('HrSettings') }}">Settings</a></li>
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
