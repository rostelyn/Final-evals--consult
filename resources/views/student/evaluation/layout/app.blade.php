<!-- resources/views/evaluation-form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 200px;
            background-color: #d8e2dc;
            height: 100vh;
            padding: 20px;
            font-size: 16px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #cad2c5;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <img src="logo.png" alt="Eastwoods College" style="width: 100%; height: auto;">
        <a href="/student-evaluation-consultation">Dashboard</a>
        <a href="{{ ('/faculty') }}">Faculty List</a>
        <a href="#">Calendar</a>
        <a href="#">Settings</a>
    </div>
    @yield('content')
</body>
</html>

