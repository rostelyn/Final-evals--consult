@extends('layouts.AdminConsult-layout')

@section('title', 'Consultation History')

@section('content')
<div class="container">
    <h2>Consultation History</h2>

    <!-- Success message display -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display consultation history in a table format -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Purpose</th>
                <th>Meeting Mode</th>
                <th>Meeting Preference</th>
                <th>Date / Time</th>
                <th>Status</th>
                <th>Decline Reason</th> <!-- New column for decline reason -->
            </tr>
        </thead>
        <tbody>
            @foreach ($history as $consult)
            <tr>
                <td>{{ $consult->name }}</td>
                <td>{{ $consult->course }}</td>
                <td>{{ $consult->purpose }}</td>
                <td>{{ $consult->meeting_mode }}</td>
                <td>{{ $consult->meeting_preference }}</td>
                <td>{{ \Carbon\Carbon::parse($consult->schedule)->format('F j, Y g:i A') }}</td> <!-- Format date -->
                <td>
                    @if($consult->status == 'approved')
                        <span class="badge badge-success">Approved</span>
                    @elseif($consult->status == 'declined')
                        <span class="badge badge-danger">Declined</span>
                    @else
                        <span class="badge badge-warning">Pending</span>
                    @endif
                </td>
                <td>
                    @if($consult->status == 'declined')
                        {{ $consult->decline_reason ?? 'No reason provided' }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Styling for the table -->
<style>
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .badge-success {
        background-color: #28a745;
        color: white;
        padding: 5px;
        border-radius: 5px;
    }

    .badge-danger {
        background-color: #dc3545;
        color: white;
        padding: 5px;
        border-radius: 5px;
    }

    .badge-warning {
        background-color: #ffc107;
        color: black;
        padding: 5px;
        border-radius: 5px;
    }
</style>
@endsection
