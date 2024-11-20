@extends('layouts.AdminConsult-layout')

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

    <button id="busyButton" onclick="openMarkBusyModal()">Mark Busy</button>

    <!-- Mark Busy Modal -->
    <div class="modal" id="markBusyModal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeMarkBusyModal()">&times;</span>
            <h3>Mark as Busy</h3>

            <!-- Error message -->
            @if($errors->has('busy_times'))
                <div class="alert alert-danger">
                    {{ $errors->first('busy_times') }}
                </div>
            @endif

            <!-- Updated form for busy slot creation -->
            <form method="POST" id="busySlotForm" action="{{ route('busySlot.store') }}">
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
                    <select id="startTime" name="startTime" required>
                        <option value="08:00">08:00 AM</option>
                        <option value="09:00">09:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="14:00">02:00 PM</option>
                        <option value="15:00">03:00 PM</option>
                        <option value="16:00">04:00 PM</option>
                        <option value="17:00">05:00 PM</option>
                    </select>

                    <label for="endTime">To:</label>
                    <select id="endTime" name="endTime" required>
                        <option value="09:00">09:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">01:00 PM</option>
                        <option value="14:00">02:00 PM</option>
                        <option value="15:00">03:00 PM</option>
                        <option value="16:00">04:00 PM</option>
                        <option value="17:00">05:00 PM</option>
                    </select>

                    <!-- Whole day checkbox -->
                    <label for="wholeDay">Mark Whole Day as Busy</label>
                    <input type="checkbox" id="wholeDay" name="wholeDay">
                </div>

                <!-- Create Button -->
                <button type="button" onclick="submitBusySlot()">Create</button>
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

    <div class="calendar-days" id="calendar-days"></div>
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

    // Open Mark Busy Modal
    function openMarkBusyModal() {
        document.getElementById("markBusyModal").style.display = "block";
    }

    // Close Mark Busy Modal
    function closeMarkBusyModal() {
        document.getElementById("markBusyModal").style.display = "none";
    }

    // Submit the busy slot form
    function submitBusySlot() {
    const date = document.getElementById("busyDate").value;
    const startTime = document.getElementById("startTime").value;
    const endTime = document.getElementById("endTime").value;
    const wholeDay = document.getElementById("wholeDay").checked;

    // Handle form validation
    if (!date || (wholeDay === false && !startTime) || (wholeDay === false && !endTime)) {
        alert("Please fill in all required fields.");
        return;
    }

    const formData = new FormData();
    formData.append('date', date);
    formData.append('start_time', startTime);
    formData.append('end_time', endTime);
    formData.append('whole_day', wholeDay);

    fetch("{{ route('busySlot.store') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Your busy slot has been saved.");
            closeMarkBusyModal();
            renderCalendar(); // Re-render the calendar to reflect new busy slots
        } else {
            alert(data.message || "Failed to save the busy slot.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred while saving the busy slot. Please try again later.");
    });
}


    // Function to open the Consultation Modal
    function openConsultationModal(date, consultations) {
        document.getElementById("selectedDate").innerText = new Date(date).toLocaleDateString();
        const consultationList = document.getElementById("consultationList");
        consultationList.innerHTML = ''; // Clear previous list

        consultations.forEach(consultation => {
            const listItem = document.createElement("li");
            listItem.innerText = `${consultation.name}: ${consultation.purpose} at ${new Date(consultation.schedule).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}`;
            consultationList.appendChild(listItem);
        });

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
