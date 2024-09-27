@extends('layouts.studentConsult-layout')

@section('title', 'High School Consultation Form')

@section('content')
<div class="container">
    <h2>High School Consultation Form</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="consultForm" action="{{ route('highschoolconsult.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <select class="form-control" id="course" name="course" required>
                <option value="BSIT/1ST YEAR/101">BSIT/1ST YEAR/101</option>
                <option value="BSIT/2ND YEAR/202">BSIT/2ND YEAR/202</option>
                <option value="BSIT/3RD YEAR/301">BSIT/3RD YEAR/301</option>
                <option value="BSIT/4TH YEAR/401">BSIT/4TH YEAR/401</option>
            </select>
        </div>
        <div class="form-group">
            <label for="purpose">Purpose</label>
            <select class="form-control" id="purpose" name="purpose" required>
                <option value="Transfer">Transfer</option>
                <option value="Return to Class">Return to Class</option>
                <option value="Academic">Academic</option>
                <option value="Graduating">Graduating</option>
                <option value="Personal">Personal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" id="department" name="department" required>
                <option value="CS">Computer Science</option>
                <option value="Engineering">Engineering</option>
                <option value="Admin Consultant">Admin Consultant</option>
            </select>
        </div>
        <div class="form-group">
            <label for="meeting_mode">Meeting Mode</label>
            <select class="form-control" id="meeting_mode" name="meeting_mode" required onchange="toggleMeetingPreference(this.value)">
                <option value="Face to face">Face to face</option>
                <option value="Online">Online</option>
            </select>
        </div>
        <div class="form-group" id="online_meeting" style="display: none;">
            <label for="meeting_preference">Meeting Preference</label>
            <select class="form-control" id="meeting_preference" name="meeting_preference">
                <option value="Google">Google</option>
                <option value="Messenger">Messenger</option>
            </select>
        </div>

        <div class="form-group">
            <label for="schedule">Schedule (1-hour time slots, between 8 AM - 5 PM)</label>
            <input type="datetime-local" class="form-control" id="schedule" name="schedule" required>
        </div>

        <p id="busyAllDayWarning" class="text-danger" style="display:none;">
            You cannot book a consultation on this day because it is fully marked as busy.
        </p>
        <p id="timeWarning" class="text-danger" style="display:none;">
            The selected time is outside business hours (8 AM - 5 PM) or conflicts with an existing consultation or busy event.
        </p>

        <button type="submit" class="btn btn-primary" disabled>Submit</button> <!-- Disabled by default -->
    </form>
</div>

<script>
    document.getElementById('consultForm').addEventListener('submit', function (event) {
        var department = document.getElementById('department').value;

        if (department === 'Admin Consultant') {
            // Add any specific behavior for Admin Consultant before submitting
            console.log("Form is submitted for Admin Consultant.");
            // Let the form submission go through as normal
        } else {
            console.log("Form is submitted for other departments.");
        }

        // The form will submit normally and the server will handle the logic
    });
    // Get the booked times and busy events from the controller as JSON
    const bookedTimes = @json($bookedTimes ?? []) || [];
    const busyTimes = @json($busyTimes ?? []) || [];

    function toggleMeetingPreference(value) {
        if (value === 'Online') {
            document.getElementById('online_meeting').style.display = 'block';
        } else {
            document.getElementById('online_meeting').style.display = 'none';
        }
    }

    // Check if the selected date is fully marked as busy
    function isBusyAllDay(selectedDate) {
        return busyTimes.some(function(time) {
            return time.is_all_day && new Date(time.from).toDateString() === new Date(selectedDate).toDateString();
        });
    }

    function isWithinBusinessHours(selectedTime) {
        const hour = selectedTime.getHours();
        return hour >= 8 && hour < 17;  // Ensure time is between 8 AM and 5 PM
    }

    function checkTimeConflict(selectedDateTime) {
        const selectedTime = new Date(selectedDateTime);

        return bookedTimes.concat(busyTimes).some(function(time) {
            const bookedFrom = new Date(time.from);
            const bookedTo = new Date(time.to || time.from); // Use 'to' if it's available, fallback to 'from' otherwise

            return selectedTime >= bookedFrom && selectedTime < bookedTo;
        });
    }

    document.getElementById('schedule').addEventListener('input', function() {
        const selectedDateTime = this.value;
        const selectedDate = new Date(selectedDateTime);
        const selectedTime = new Date(selectedDateTime);

        const isAllDayBusy = isBusyAllDay(selectedDate);
        const isTimeConflict = checkTimeConflict(selectedDateTime);
        const isBusinessHours = isWithinBusinessHours(selectedTime);

        const busyAllDayWarning = document.getElementById('busyAllDayWarning');
        const timeWarning = document.getElementById('timeWarning');
        const submitButton = document.querySelector('button[type="submit"]');

        if (isAllDayBusy) {
            busyAllDayWarning.style.display = 'block';
            timeWarning.style.display = 'none';
            submitButton.disabled = true;
        } else if (isTimeConflict || !isBusinessHours) {
            timeWarning.style.display = 'block';
            busyAllDayWarning.style.display = 'none';
            submitButton.disabled = true;
        } else {
            busyAllDayWarning.style.display = 'none';
            timeWarning.style.display = 'none';
            submitButton.disabled = false;
        }
    });
</script>
@endsection
