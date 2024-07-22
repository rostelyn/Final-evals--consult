@extends('layouts.DpHead-layout')

@section('content')
<div class="header" style="background-color: transparent;">
    <h1>Approve - Disapprove Appointments</h1>
</div>
<div class="content">
    <div class="box">
        <div class="box-header">
            <h2>Appointment Details</h2>
        </div>
        <div class="box-content">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Course/Grade Level/Section</th>
                        <th>Purpose</th>
                        <th>Date / Time</th>
                        <th>Meeting Mode</th>
                        <th>Meeting Preference</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->course }}</td>
                            <td>{{ $appointment->purpose }}</td>
                            <td>{{ $appointment->schedule }}</td>
                            <td>{{ $appointment->meeting_mode }}</td>
                            <td>{{ $appointment->online_preference }}</td>
                            <td>
                                <form action="{{ route('consultations.approve', $appointment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('consultations.disapprove', $appointment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Disapprove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="actions">
        <button onclick="savePDF()">Save PDF</button>
        <button onclick="printAppointments()">Print</button>
    </div>
</div>

<script>
    function savePDF() {
        // Add save PDF functionality here
    }

    function printAppointments() {
        // Add print functionality here
    }
</script>
@endsection
