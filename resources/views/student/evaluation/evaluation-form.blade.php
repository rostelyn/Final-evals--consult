@extends('layouts.evaluation-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=DM+Serif+Text:ital@0;1&family=Diplomata+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/EvaluationForm.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h1 class="h1">Eastwoods Professional College of Science and Technology</h1>
        </div>
        <div class="evaluation-content">
            <div class="select-year-container">
                <h2 class="h2">Select School Year:</h2>
                <select class="form-select" id="school_year" name="school_year">
                    <option value="2023-2024">2023-2024</option>
                    <option value="2024-2025" selected>2024-2025</option>
                    <option value="2025-2026">2025-2026</option>
                </select>
            </div>
            <form action="{{ route('evaluation.submit') }}" method="POST">
                @csrf
                <div class="evaluation-form">
                    <div class="evaluation-section">
                        <h2 class="h2">PART 1</h2>
                        <h2 class="h2">Directions:</h2>
                        <p>Kindly evaluate your teacher/s per subject according to their teaching performance.</p>
                        <label for="teacher_name">Teacher Name:</label>
        <input type="text" id="teacher_name" name="teacher_name" value="{{ $teacherName }}" readonly>

                        <div class="form-group">
                            <h2 class="h2">Subject:</h2>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <h2 class="h2">Teaching Performance:</h2>
                            <textarea class="form-control" id="teaching_performance" name="teaching_performance" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="evaluation-section">
                        <h2 class="h2">PART 2</h2>
                        <h2 class="h2">Directions:</h2>
                        <p>Kindly evaluate the following in terms of facilities and services.</p>
                        <div class="form-group">
                            <h2 class="h2">Library:</h2>
                            <textarea class="form-control" id="library" name="library" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <h2 class="h2">Laboratory:</h2>
                            <textarea class="form-control" id="laboratory" name="laboratory" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <h2 class="h2">Comfort Room:</h2>
                            <textarea class="form-control" id="comfort_room" name="comfort_room" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <h2 class="h2">Canteen:</h2>
                            <textarea class="form-control" id="canteen" name="canteen" rows="2" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ ('/faculty/college/Computer%20Department') }}" class="back-btn">Back</a>
                    <button type="submit" class="submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @if(session('success'))
        <div class="custom-popup">
            <div class="popup-content">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.querySelector('.custom-popup');
        if (popup) {
            setTimeout(() => {
                popup.style.display = 'none';
            }, 3000);
        }
    });
    </script>
</body>
</html>
@endsection
