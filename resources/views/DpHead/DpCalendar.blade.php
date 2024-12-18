@extends('layouts.DpHead-layout')

@section('title', 'Admin Consultation Calendar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ctcalendar.css') }}">

<h2>Admin Consultation Calendar</h2>

<div class="calendar-container">
    <div class="calendar-header">
        <button onclick="changeMonth(-1)">&#10094;</button>
        <h3 id="monthYear"></h3>
        <button onclick="changeMonth(1)">&#10095;</button>
    </div>

    <button id="busyButton" onclick="openBusyModal()">Mark Busy</button>

    <!-- Busy Modal -->
    <div class="modal" id="busyModal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeBusyModal()">&times;</span>
            <h3>Mark as Busy</h3>

            <!-- Error message -->
            @if($errors->has('busy_times'))
                <div class="alert alert-danger">
                    {{ $errors->first('busy_times') }}
                </div>
            @endif

            <!-- Updated form for busy slot creation -->
            <form method="POST" action="{{ route('busySlot.store') }}">
                @csrf

                <!-- Hidden consultation ID -->
                <input type="hidden" name="consultation_id" value="{{ $consultationId ?? '' }}">
                
                <div>
                    <label for="busyTitle">Title:</label>
                    <input type="text" name="title" id="busyTitle" required>
                </div>

                <div>
                    <label for="busyDescription">Description:</label>
                    <textarea name="description" id="busyDescription" rows="3"></textarea>
                </div>

                <div>
                    <label for="busyDate">Select Date:</label>
                    <input type="date" name="date" id="busyDate" required>
                </div>

                <div>
                    <h4>Select Time Slots:</h4>
                    @foreach(['8:00', '9:00', '10:00', '11:00', '14:00', '15:00', '16:00', '17:00'] as $time)
                        <label>
                            <input type="checkbox" name="busy_times[]" value="{{ $time }}">
                            {{ $time }}
                        </label><br>
                    @endforeach
                </div>

                <button type="submit">Create</button>
            </form>
        </div>
    </div>

    <!-- Consultation Modal -->
    <div class="modal" id="consultationModal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeConsultationModal()">&times;</span>
            <h3>Consultations on <span id="selectedDate"></span></h3>
            <ul id="consultationList"></ul>
        </div>
    </div>

    <div class="calendar-days" id="calendar-days">
        <!-- Render the calendar days dynamically -->
        @foreach($consultations as $consultation)
            <div class="day">
                <p>{{ \Carbon\Carbon::parse($consultation->date)->format('M d, Y') }}</p> <!-- Display the formatted date -->
                <p>{{ $consultation->title }}</p>
                <p>{{ $consultation->description }}</p>
                <p>{{ $consultation->time }}</p>
            </div>
        @endforeach
    </div>
</div>

<script>
    let currentDate = new Date();
    const consultations = @json($consultations); // Preloaded consultations from PHP
    const busySlots = @json($busySlots); // Preloaded busy slots from PHP

    // Function to render the calendar
    function renderCalendar() {
        const monthYearDisplay = document.getElementById('monthYear');
        const calendarDays = document.getElementById('calendar-days');

        const month = currentDate.getMonth();
        const year = currentDate.getFullYear();

        monthYearDisplay.innerText = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });
        calendarDays.innerHTML = '';

        const firstDay = new Date(year, month, 1).getDay();
        const totalDays = new Date(year, month + 1, 0).getDate();

        // Create blank days for alignment
        for (let i = 0; i < firstDay; i++) {
            const blankDay = document.createElement('div');
            blankDay.className = 'day blank';
            calendarDays.appendChild(blankDay);
        }

        // Fill in the days with consultations and busy slots
        for (let day = 1; day <= totalDays; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'day';
            dayElement.innerText = day;

            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            // Add consultations for this date
            const dayConsultations = consultations.filter(consultation => consultation.schedule.startsWith(dateStr));
            if (dayConsultations.length > 0) {
                dayElement.classList.add('has-consultation'); // Highlight days with consultations
                dayElement.onclick = () => openConsultationModal(dateStr, dayConsultations);
            }

            // Add busy slots for this date
            busySlots.forEach(slot => {
                if (slot.date === dateStr) {
                    const busyElement = document.createElement('div');
                    busyElement.className = 'busy-slot';
                    busyElement.innerText = `${slot.title} (${slot.busy_times.join(', ')})`;
                    dayElement.appendChild(busyElement);
                }
            });

            calendarDays.appendChild(dayElement);
        }
    }

    // Function to change the month in the calendar
    function changeMonth(delta) {
        currentDate.setMonth(currentDate.getMonth() + delta);
        renderCalendar();
    }

    // Function to open the "Mark Busy" modal
    function openBusyModal(date = null) {
        // Preload busy times for the selected date
        const busyTimesForDate = busySlots.filter(slot => slot.date === date).flatMap(slot => slot.busy_times);

        // Disable checkboxes for already busy times
        document.querySelectorAll('input[name="busy_times[]"]').forEach(checkbox => {
            checkbox.disabled = busyTimesForDate.includes(checkbox.value);
        });

        // Set the date if provided
        if (date) {
            document.getElementById('busyDate').value = date;
        }

        // Display the modal
        document.getElementById("busyModal").style.display = "block";
    }

    // Function to close the busy modal
    function closeBusyModal() {
        document.getElementById("busyModal").style.display = "none";
        // Re-enable all checkboxes when closing the modal
        document.querySelectorAll('input[name="busy_times[]"]').forEach(checkbox => {
            checkbox.disabled = false;
        });
    }

    // Function to open the Consultation Modal
    function openConsultationModal(date, consultations) {
        // Display the formatted date in the modal header
        document.getElementById("selectedDate").innerText = new Date(date).toLocaleDateString();
        
        const consultationList = document.getElementById("consultationList");
        consultationList.innerHTML = ''; // Clear previous list

        consultations.forEach(consultation => {
            const listItem = document.createElement("li");
            listItem.innerText = `${consultation.name}: ${consultation.purpose} at ${new Date(consultation.schedule).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
            consultationList.appendChild(listItem);
        });

        // Show the modal with consultation details
        document.getElementById("consultationModal").style.display = "block";
    }

    // Function to close the Consultation Modal
    function closeConsultationModal() {
        document.getElementById("consultationModal").style.display = "none";
    }

    // Initial render
    renderCalendar();
</script>

<style>
    .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        padding: 1em;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .modal-content {
        position: relative;
        padding: 20px;
        text-align: left;
    }

    .close {
        position: absolute;
        top: 8px;
        right: 8px;
        cursor: pointer;
        font-size: 20px;
        font-weight: bold;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        grid-template-rows: auto;
    }

    .day {
        border: 1px solid #e0e0e0;
        padding: 15px;
        text-align: center;
        min-height: 60px;
        cursor: pointer;
    }

    .day.has-consultation {
        background-color: #e0f7fa; /* Highlight days with consultations */
        font-weight: bold;
    }

    .consultation {
        background-color: #e0f7fa;
        padding: 5px;
        margin-top: 5px;
        border-radius: 4px;
    }

    .busy-slot {
        background-color: #ffebee;
        padding: 5px;
        margin-top: 5px;
        border-radius: 4px;
    }

    .blank {
        border: none;
    }
</style>
@endsection
