<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Student/HighSchoolindex.css') }}">
    <title>Select Department</title>

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

  