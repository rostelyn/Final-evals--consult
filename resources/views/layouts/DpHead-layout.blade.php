<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation - Student Evaluation and Consultation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
        <img src="{{ asset('css/resources/logoo.jpg') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="{{('#') }}">Dashboard</a></li>
            <li><a href="#">Student List</a></li>
            <li><a href="DpHeadAppDis">Approve/Disapprove</a></li>
            <li><a href="#">Calendar</a></li>
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Settings</a></li>
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
