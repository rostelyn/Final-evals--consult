<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR - Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="{{ asset('css/logoo.jpg') }}" alt="Logo">
        </div>
        <ul>

            <li><a href="{{('hr-db') }}">Dashboard</a></li>
            <li><a href="{{('hr-studentlist') }}">Student List</a></li>
            <li><a href="{{('hr-calendar') }}">Calendar</a></li>
            <li><a href="{{('hr-notify') }}">Notifications</a></li>
            <li><a href="{{('hr-history') }}">Evaluation History</a></li>
            <li><a href="{{('hr-settings') }}">Settings</a></li>
            <li><a href="{{ ('hr-db') }}">Dashboard</a></li>
            <li><a href="{{ ('hr-studentlist') }}">Student List</a></li>
            <li><a href="{{ ('hr-calendar') }}">Calendar</a></li>
            <li><a href="{{ ('hr-notify') }}">Notifications</a></li>
            <li><a href="{{ ('hr-history') }}">Evaluation History</a></li>
            <li><a href="{{ ('hr-settings') }}">Settings</a></li>

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
