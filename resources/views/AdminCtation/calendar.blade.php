@extends('layouts.AdminConsult-layout')

@section('title', 'Consultation Calendar')

@section('content')
<div class="container">
    <!-- Success message display -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Consultation Calendar for {{ $currentDate->format('F Y') }}</h2>

    <!-- Calendar Layout -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sunday</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
            </tr>
        </thead>
        <tbody>
            @php
                // Get the first day of the month
                $firstDayOfMonth = $currentDate->copy()->startOfMonth();
                $lastDayOfMonth = $currentDate->copy()->endOfMonth();

                // Calculate the starting day of the calendar (Sunday as the start of the week)
                $startOfCalendar = $firstDayOfMonth->copy()->startOfWeek();

                // Calculate the ending day of the calendar (Saturday as the end of the week)
                $endOfCalendar = $lastDayOfMonth->copy()->endOfWeek();

                // Loop through each week
                $currentDay = $startOfCalendar->copy();
            @endphp

            @while ($currentDay->lessThanOrEqualTo($endOfCalendar))
                <tr>
                    @for ($i = 0; $i < 7; $i++)
                        <td @if ($currentDay->month != $currentDate->month) class="text-muted" @endif>
                            <!-- Date as clickable link -->
                            <a href="#" data-toggle="modal" data-target="#appointmentsModal"
                               onclick="showAppointments('{{ $currentDay->format('Y-m-d') }}')">
                                {{ $currentDay->day }}
                            </a>

                            <!-- Check if there are consultations on this day -->
                            @foreach ($consultations as $consultation)
                                @php
                                    $consultationSchedule = \Carbon\Carbon::parse($consultation->schedule);
                                @endphp
                                @if ($consultationSchedule->isSameDay($currentDay))
                                    <div class="badge badge-primary">
                                        Consultation: {{ $consultation->name }}
                                    </div>
                                @endif
                            @endforeach

                            <!-- Check if there are busy events on this day -->
                            @if(isset($busyEvents) && $busyEvents->isNotEmpty())
                                @foreach ($busyEvents as $busyEvent)
                                    @php
                                        $busyEventFrom = $busyEvent->schedule_from ? \Carbon\Carbon::parse($busyEvent->schedule_from) : null;
                                        $busyEventTo = $busyEvent->schedule_to ? \Carbon\Carbon::parse($busyEvent->schedule_to) : null;
                                    @endphp
                                    @if ($busyEventFrom && $busyEventFrom->isSameDay($currentDay))
                                        <div class="badge badge-danger">
                                            Busy: {{ $busyEvent->reason }}
                                            @if($busyEventFrom && $busyEventTo)
                                                ({{ $busyEventFrom->format('h:i A') }} - {{ $busyEventTo->format('h:i A') }})
                                            @endif
                                            
                                            <!-- Delete button for busy event -->
                                            <form action="{{ route('deletehours', $busyEvent->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        @php
                            $currentDay->addDay();
                        @endphp
                    @endfor
                </tr>
            @endwhile
        </tbody>
    </table>

    <!-- Create Event Button -->
    <button id="createEventButton" class="btn btn-secondary" data-toggle="modal" data-target="#createEventModal">Create Busy Hour</button>

    <!-- Modal to Create Busy Hour Event -->
    <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mark as Busy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('busyhourscreate') }}" method="POST"> <!-- Updated Route Name -->
                    @csrf  <!-- Ensure CSRF token is included -->
                    
                    <!-- Form fields for creating busy hours -->
                    <div class="modal-body">
                        <!-- Date Picker -->
                        <div class="form-group">
                            <label for="busyDate">Date</label>
                            <input type="date" class="form-control" id="busyDate" name="busyDate" required>
                        </div>

                        <!-- Time From-To Picker -->
                        <div class="form-group">
                            <label for="busyFromTime">From</label>
                            <input type="time" class="form-control" id="busyFromTime" name="busyFromTime" required>
                        </div>
                        <div class="form-group">
                            <label for="busyToTime">To</label>
                            <input type="time" class="form-control" id="busyToTime" name="busyToTime" required>
                        </div>

                        <!-- Reason for Busy -->
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>

                        <!-- Busy for Whole Day (Optional) -->
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="busyAllDay" name="busyAllDay" onclick="toggleTimeFields(this)">
                            <label class="form-check-label" for="busyAllDay">Busy for the Whole Day</label>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal to Display Consultations and Busy Hours -->
    <div class="modal fade" id="appointmentsModal" tabindex="-1" role="dialog" aria-labelledby="appointmentsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="appointmentsModalLabel">Appointments and Busy Hours for <span id="modal-date"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-appointments">
                    <!-- Consultations and Busy Hours will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Basic Styling -->
<style>
    .table th, .table td {
        width: 14.28%; /* 7 columns */
        height: 100px;
        vertical-align: top;
    }
    .table .text-muted {
        background-color: #f9f9f9;
    }
    .badge-primary {
        background-color: #007bff;
        color: white;
        padding: 5px;
        margin-top: 5px;
        display: block;
        border-radius: 5px;
    }
    .badge-danger {
        background-color: #dc3545;
        color: white;
        padding: 5px;
        margin-top: 5px;
        display: block;
        border-radius: 5px;
    }
</style>

<!-- Script to Handle Time and Day Input -->
<script>
    function toggleTimeFields(checkbox) {
        var fromTimeField = document.getElementById('busyFromTime');
        var toTimeField = document.getElementById('busyToTime');

        if (checkbox.checked) {
            // If "Busy for the Whole Day" is checked, disable and set times to whole day
            fromTimeField.value = '08:00';
            toTimeField.value = '17:00';
            fromTimeField.disabled = true;
            toTimeField.disabled = true;
        } else {
            // If not checked, allow manual entry
            fromTimeField.disabled = false;
            toTimeField.disabled = false;
            fromTimeField.value = '';
            toTimeField.value = '';
        }
    }

    function showAppointments(date) {
        // Update the modal title with the selected date
        document.getElementById('modal-date').innerText = date;

        // Clear previous consultations and busy hours
        document.getElementById('modal-appointments').innerHTML = '';

        // Add consultations for the clicked date
        @foreach ($consultations as $consultation)
            if ("{{ $consultation->schedule->format('Y-m-d') }}" === date) {
                document.getElementById('modal-appointments').innerHTML += `
                    <p><strong>{{ $consultation->name }}</strong><br>
                    Purpose: {{ $consultation->purpose }}<br>
                    Time: {{ $consultation->schedule->format('h:i A') }}</p>
                `;
            }
        @endforeach

        // Add busy hours for the clicked date
        @if(isset($busyEvents) && $busyEvents->isNotEmpty())
            @foreach ($busyEvents as $busyEvent)
                @php
                    $busyEventFrom = $busyEvent->schedule_from ? \Carbon\Carbon::parse($busyEvent->schedule_from) : null;
                    $busyEventTo = $busyEvent->schedule_to ? \Carbon\Carbon::parse($busyEvent->schedule_to) : null;
                @endphp
                if ("{{ $busyEventFrom->format('Y-m-d') }}" === date) {
                    document.getElementById('modal-appointments').innerHTML += `
                        <p><strong>Busy: {{ $busyEvent->reason }}</strong><br>
                        Time: {{ $busyEventFrom->format('h:i A') }} - {{ $busyEventTo->format('h:i A') }}</p>
                    `;
                }
            @endforeach
        @endif

        // If no consultations or busy hours are found
        if (document.getElementById('modal-appointments').innerHTML === '') {
            document.getElementById('modal-appointments').innerHTML = '<p>No consultations or busy hours for this day.</p>';
        }
    }
</script>
@endsection
