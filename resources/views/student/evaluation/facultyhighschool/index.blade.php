<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre&display=swap" rel="stylesheet">
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

        .department-heading {
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

        .department-card {
            width: 230px; /* Adjusted for size consistency */
            height: 250px; /* Adjusted for size consistency */
            background-color: #0F67B1; /* Matching color for consistency */
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            padding: 15px;
        }

        .department-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .department-card img {
            width: 150px; /* Image size adjustment */
            height: 150px;
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
<body class="{{ strtolower($grade_level_section) === 'highschool' ? 'highschool-bg' : 'college-bg' }}">
    <div class="department-heading">
        <h1>Select {{ ucfirst($grade_level_section) }} Department</h1>
    </div>

    <div class="department-container">
        @foreach ($departments as $department)
            <div class="department-card">
                <img src="{{ $departmentImages[$department] }}" alt="{{ $department }} Image">
                <a href="{{ route('faculty.show', ['grade_level_section' => 'highschool', 'department' => $department]) }}" class="department-link">
                <span class="department-link">
                {{ $department }}
                </span>
                </a>
            </div>
        @endforeach
    </div>
</body>
</html>

  