@extends('layouts.evaluation-layout')

@section('content')

<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        width: 100%;
        max-width: 1200px; /* Limits the container width */
        margin: 0 auto; /* Centers the container */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow */
        background-color: #ffffff;
        border-radius: 10px; /* Rounds the container corners */
    }

    h2 {
        font-size: 2rem;
        margin-bottom: 2rem;
        color: #333333;
        text-transform: uppercase;
    }

    .evaluation-content {
        width: 100%;
    }

    .evaluation-section {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 2rem;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #4BC0C0; /* Highlight color */
    }

    .form-select, .form-control {
        width: 100%;
        padding: 12px;
        margin-bottom: 1.5rem;
        border: 1px solid #ced4da;
        border-radius: 8px;
        font-size: 1rem;
        background-color: #ffffff;
    }

    textarea.form-control {
        resize: vertical;
    }

    h5 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #4BC0C0; /* Highlight color */
        text-transform: uppercase;
    }

    p {
        margin-bottom: 1.5rem;
        color: #6c757d;
    }

    .btn {
        padding: 12px 20px;
        font-size: 1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: #ffffff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-primary {
        background-color: #4BC0C0; /* Primary button color */
        border: none;
        color: #ffffff;
    }

    .btn-primary:hover {
        background-color: #3da9a9;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="container">
    <div class="evaluation-content">
        <h2 class="text-center mb-4">EASTWOODS Professional College of Science and Technology</h2>
        
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
            <div class="evaluation-section mb-4">
                <h5>PART 1</h5>
                <p>Directions: Kindly evaluate your teacher/s per subject according to their teaching performance.</p>
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
            
            <div class="evaluation-section mb-4">
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
                <a href="{{ url('/faculty.show') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
