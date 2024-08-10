@extends('layouts.evaluation-layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Student/evaluationform.css') }}">
    <title>Document</title>
</head>
<body>
    

    <div class="container">
        <h2 class="text-center mb-4">EASTWOODS Professional College of Science and Technology</h2>
        
        <div class="evaluation-content">
            <!-- Select School Year Section -->
            <div class="text-center mb-4">
                <label for="school_year" class="form-label">Select School Year:</label>
                <select class="form-select" id="school_year" name="school_year">
                    <option value="2023-2024">2023-2024</option>
                    <option value="2024-2025" selected>2024-2025</option>
                    <option value="2025-2026">2025-2026</option>
                </select>
            </div>
            
            <!-- Evaluation Form -->
            <form action="{{ route('evaluation.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <h5>PART 1</h5>
                    <p>Directions: Kindly evaluate your teacher/s per subject according to their teaching performance</p>
                    <div class="form-group">
                        <label for="teacher_name" class="form-label">Name of Teacher:</label>
                        <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="form-label">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="teaching_performance" class="form-label">Teaching Performance:</label>
                        <textarea class="form-control" id="teaching_performance" name="teaching_performance" rows="4" required></textarea>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h5>PART 2</h5>
                    <p>Directions: Kindly evaluate the following in terms of facilities and services.</p>
                    <div class="form-group">
                        <label for="library" class="form-label">Library:</label>
                        <textarea class="form-control" id="library" name="library" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="laboratory" class="form-label">Laboratory:</label>
                        <textarea class="form-control" id="laboratory" name="laboratory" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comfort_room" class="form-label">Comfort Room:</label>
                        <textarea class="form-control" id="comfort_room" name="comfort_room" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="canteen" class="form-label">Canteen:</label>
                        <textarea class="form-control" id="canteen" name="canteen" rows="2" required></textarea>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/faculty') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
 <style>
    /* Styling the form evaluation*/
.evaluation-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
}

h2 {
    font-size: 1.75rem;
    margin-bottom: 1.5rem;
    color: #333333;
}

.form-label {
    font-weight: bold;
    margin-bottom: 0.5rem;
    color: #555555;
}

.form-select, .form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
}

textarea.form-control {
    resize: vertical;
}

h5 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
    color: #333333;
}

p {
    margin-bottom: 1.5rem;
    color: #666666;
}

.btn {
    padding: 8px 16px; /* Slightly reduced padding */
    font-size: 0.9rem; /* Slightly reduced font size */
    border-radius: 5px;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
    color: #ffffff;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    color: #ffffff;
}

.d-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

.text-center {
    text-align: center;
}
 </style>


</body>
</html>
