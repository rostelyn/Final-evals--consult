<!DOCTYPE html>
<html lang="en">
<head>
    
    
    <title>HR - Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/Hsapp.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="{{ asset('css/GeneralResources/hslogo.jpg') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="{{('HrDashboard') }}">Dashboard</a></li>
            <li><a href="{{('HrStudentList') }}">Student List</a></li>
            <li><a href="{{('HrCalendar') }}">Calendar</a></li>
            <li><a href="{{('HrNotification') }}">Notifications</a></li>
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
