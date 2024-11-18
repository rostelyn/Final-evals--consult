<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
    <title>Select Department</title>
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Georgia', serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .department-title {
            font-family: "Averia Serif Libre", serif;
            color: black;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 90px; /* Space below the title */
            margin-top: -250px; /* Adjusted to lift it higher */
        }

        .department-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .department-item {
         width: 230px; /* Larger container */
        height: 250px; /* Larger container */
        background-color: #18A558;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        padding: 15px; /* Adjusted padding */
        }

        .department-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .department-item img {
        width: 150px; /* Larger image width */
        height: 150px; /* Larger image height */
        object-fit: cover;
        border-radius: 50%;
        }

        .department-link {
            font-size: 1.2rem;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .department-link:hover {
            color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1 class="department-title">Select Department</h1>

    <div class="department-container">
        @foreach($departments as $department)
            <div class="department-item">
                <!-- Add your image path dynamically here -->
                <img src="{{ $departmentImages[$department] ?? asset('images/default.jpg') }}" alt="{{ $department }} Image">
                    <a href="{{ url('/faculty/'.$department) }}" class="department-link">
                    {{ $department }}
                    </a>
            </div>
        @endforeach
    </div>
</body>
</html>
