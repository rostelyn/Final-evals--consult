@extends('layouts.evaluation-layout')

@section('content')
    <style>
        body {
            display: flex;
        }
        .content {
            padding: 20px;
            flex-grow: 1;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>

    <div class="content">
        <h2 class="text-center">EASTWOODS Professional College of Science and Technology</h2>
        
        <!-- Select School Year Section -->
        <div class="text-center mb-3">
            <label for="school_year" class="form-label">Select School Year:</label>
            <select class="form-select" id="school_year" name="school_year">
                <option value="2023-2024">2023-2024</option>
                <option value="2024-2025" selected>2024-2025</option>
                <option value="2025-2026">2025-2026</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        
        <!-- Evaluation Form -->
        <h4 class="text-center">Evaluation Sheet</h4>
        <form action="{{ route('evaluation.submit') }}" method="POST">
            @csrf
            <h5>PART 1</h5>
            <p>Directions: Kindly evaluate your teacher/s per subject according to their teaching performance</p>
            <div class="form-group">
                <label for="teacher_name">Name of Teacher:</label>
                <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="teaching_performance">Teaching Performance:</label>
                <textarea class="form-control" id="teaching_performance" name="teaching_performance" rows="4" required></textarea>
            </div>
            <h5>PART 2</h5>
            <p>Directions: Kindly evaluate the following in terms of facilities and services.</p>
            <div class="form-group">
                <label for="library">Library:</label>
                <textarea class="form-control" id="library" name="library" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="laboratory">Laboratory:</label>
                <textarea class="form-control" id="laboratory" name="laboratory" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="comfort_room">Comfort Room:</label>
                <textarea class="form-control" id="comfort_room" name="comfort_room" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label for="canteen">Canteen:</label>
                <textarea class="form-control" id="canteen" name="canteen" rows="2" required></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ ('/faculty') }}" class="btn btn-secondary mb-3">Back</a> <!-- Adjust the route as per your application -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
