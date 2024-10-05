<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token for form submissions and AJAX requests -->
    <title>@yield('title', 'Admin - Student Evaluation and Consultation')</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.5.0/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.5.0/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.5.0/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">


    @yield('styles')
</head>
<body>
    <div class="sidebar" id="sidebar">
           <div class="logo">
                 <h1>Consultation Admin</h1>
           </div>
        <ul>
            <li><a href="{{ route('CTDashboard') }}">Dashboard</a></li>
            <li><a href="{{ route ('CtStudentList') }}">Student List</a></li>
            <li><a href="{{ route('consult.approval') }}">Approve/Disapprove</a></li> 
            <li><a href="{{ route('calendar.show') }}">Calendar</a></li> 
            <li><a href="{{ route('CtNotification') }}">Notifications</a></li>
            <li><a href="{{ route('consult.history') }}">Consultation History</a></li> 
            <li><a href="{{ route('CtDocumentation') }}">Documentation</a></li>
            <li><a href="{{ route('CtSettings') }}">Settings</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="menu-icon" onclick="toggleSidebar()">☰</div>
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Moment.js (for date manipulations) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.5.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.5.0/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.5.0/main.min.js'></script>

    <!-- View-specific scripts -->
    @yield('scripts')

    <script>
        function toggleSidebar() {
            $('#sidebar').toggleClass('collapsed');
        }
    </script>
</body>
</html>
