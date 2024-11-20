@extends('layouts.studentConsult-layout')

@section('title', 'High School Consultation Form')

@section('content')
<link rel="stylesheet" href="{{ asset('css/collegeconsult.css') }}">

@if(session('success'))
    <!-- Modal for Success Message -->
    <div class="modal" id="successModal" style="display: block;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p>{{ session('success') }}</p>
        </div>
    </div>
@endif

<!-- Consultation Form -->
<!-- CollegeConsult.blade.php or HSchoolConsult.blade.php -->

<form id="consultationForm">
    @csrf

    <!-- Name -->
    <label for="name">NAME:</label>
    <input type="text" name="name" required>

    <!-- Course/Grade Level/Section -->
    <label for="course">COURSE/GRADE LEVEL/SECTION:</label>
    <select name="course" required>
        <option value="BSIT/1STYEAR/101">BSIT/1STYEAR/101</option>
        <option value="BSIT/2NDYEAR/201">BSIT/2NDYEAR/201</option>
        <option value="BSIT/3RDYEAR/301">BSIT/3RDYEAR/301</option>
        <option value="BSIT/4THYEAR/401">BSIT/4THYEAR/401</option>
    </select>

    <!-- Purpose -->
    <label for="purpose">PURPOSE OF CONSULTATION:</label>
    <select name="purpose" required>
        <option value="transfer">TRANSFER</option>
        <option value="return_class">RETURN TO CLASS - ACADEMIC</option>
        <option value="graduating">GRADUATING STUDENTS</option>
        <option value="personal">PERSONAL</option>
    </select>

    <!-- Consultant -->
    <label for="consultant">SELECT CONSULTANT:</label>
    <select name="consultant" required>
        <option value="department_head">DEPARTMENT HEAD</option>
        <option value="admin_consultant">ADMIN CONSULTANT</option>
    </select>

    <!-- Meeting Mode -->
    <label for="meeting_mode">SELECT MEETING MODE:</label>
    <select name="meeting_mode" id="meeting_mode" required onchange="toggleOnlineOptions()">
        <option value="face_to_face">FACE TO FACE</option>
        <option value="online">ONLINE</option>
    </select>

    <!-- Online Meeting Options (conditional) -->
    <div id="onlineOptions" style="display:none;">
        <label for="online_platform">IF ONLINE, CHOOSE VIA MEETING PREFERENCE:</label>
        <select name="online_platform">
            <option value="google_meet">GOOGLE MEET</option>
            <option value="messenger">MESSENGER</option>
        </select>
    </div>

    <!-- Schedule Date -->
    <label for="schedule_date">SELECT DATE:</label>
    <input type="date" name="schedule_date" required>

    <!-- Schedule Time -->
    <label for="schedule_time">SELECT TIME:</label>
    <input type="time" name="schedule_time" required>

    <!-- Submit Button -->
    <button type="submit">CONFIRM APPOINTMENT</button>
</form>

<!-- Success Modal -->
<div class="modal" id="successModal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p id="modalMessage">Consultation request successfully submitted!</p>
    </div>
</div>

<script>
    // Prevent default form submission and handle it with AJAX
    document.getElementById("consultationForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form from submitting in the usual way

        const formData = new FormData(this); // Get form data
        fetch("{{ route('consultation.submit') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value // Pass CSRF token
            },
            body: formData
        })
        .then(response => response.json()) // Expecting JSON response
        .then(data => {
            if (data.success) {
                document.getElementById("modalMessage").innerText = data.message; // Set modal message
                document.getElementById("successModal").style.display = "block"; // Show success modal

                // Automatically close the modal after 3.5 seconds
                setTimeout(() => {
                    closeModal();
                    document.getElementById("consultationForm").reset(); // Clear form fields
                }, 3500);
            }
        })
        .catch(error => console.error("Error:", error)); // Log errors if any
    });

    // Close the modal
    function closeModal() {
        document.getElementById("successModal").style.display = "none";
    }

    // Toggle the online meeting options based on the selected mode
    function toggleOnlineOptions() {
        var mode = document.getElementById("meeting_mode").value;
        document.getElementById("onlineOptions").style.display = mode === "online" ? "block" : "none";
    }
</script>

@endsection
