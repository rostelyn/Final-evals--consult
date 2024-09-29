<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token for form submissions and AJAX requests -->
    <title>@yield('title', 'Admin - Student Evaluation and Consultation')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.5.0/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.5.0/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.5.0/main.min.css' rel='stylesheet' />

    <!-- Additional Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- View-specific styles -->
    @yield('styles')
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="{{ asset('css/GeneralResources/logoo.jpg') }}" alt="Logo">
        </div>
        <ul>
            <li><a href="{{ route('CTDashboard') }}">Dashboard</a></li>
            <li><a href="{{ route ('CtStudentList') }}">Student List</a></li>
            <li><a href="{{ route('consult.approval') }}">Approve/Disapprove</a></li> <!-- Updated route -->
            <li><a href="{{ route('calendar.show') }}">Calendar</a></li> <!-- Updated route -->
            <li><a href="{{ route('CtNotification') }}">Notifications</a></li>
            <li><a href="{{ route('consult.history') }}">Consultation History</a></li> <!-- Updated route -->
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
