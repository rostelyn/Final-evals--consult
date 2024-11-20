@extends('layouts.studentConsult-layout')

@section('title', 'Student Consultation Calendar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ctcalendar.css') }}">

<h2>Your Consultation Calendar</h2>

<div class="calendar-container">
    <div class="calendar-header">
        <button onclick="changeMonth(-1)">&#10094;</button>
        <h3 id="monthYear"></h3>
        <button onclick="changeMonth(1)">&#10095;</button>
    </div>

    <div class="calendar-days" id="calendar-days"></div>
</div>

<!-- Modal for displaying consultations of a specific day -->
<div class="modal" id="consultationModal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Consultations on <span id="selectedDate"></span></h3>
        <ul id="consultationList"></ul>
    </div>
</div>

<script>
    let currentDate = new Date();
    const consultations = @json($consultations); // Preloaded student consultations

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

        // Fill in the days with student consultations
        for (let day = 1; day <= totalDays; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'day';
            dayElement.innerText = day;

            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

            // Add consultations for this date
            const dayConsultations = consultations.filter(consultation => consultation.schedule.startsWith(dateStr));
            if (dayConsultations.length > 0) {
                dayElement.classList.add('has-consultation'); // Highlight days with consultations
                dayElement.onclick = () => openModal(dateStr, dayConsultations);
            }

            calendarDays.appendChild(dayElement);
        }
    }

    function changeMonth(delta) {
        currentDate.setMonth(currentDate.getMonth() + delta);
        renderCalendar();
    }

    function openModal(date, consultations) {
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


    function closeModal() {
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

    .blank {
        border: none;
        cursor: default;
    }
</style>
@endsection
