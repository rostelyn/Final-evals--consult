@extends('layouts.studentConsult-layout')

@section('title', 'Student Consultation History')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/globalhistory.css') }}">

    <h2>Your Consultation History</h2>


        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course/Grade Level/Section</th>
                    <th>Purpose</th>
                    <th>Meeting Mode</th>
                    <th>Online Platform</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Decline Reason</th>
                </tr>
            </thead>
            <tbody>
    @forelse($consultations as $consultation)
        <tr>
            <td>{{ $consultation->name }}</td>
            <td>{{ $consultation->course }}</td>
            <td>{{ $consultation->purpose }}</td>
            <td>{{ $consultation->meeting_mode }}</td>
            <td>{{ $consultation->online_platform ?? 'N/A' }}</td>
            <td>{{ \Carbon\Carbon::parse($consultation->schedule)->format('M d, Y - h:i A') }}</td>
            <td>{{ ucfirst($consultation->status) }}</td>
            <td>{{ $consultation->decline_reason ?? 'N/A' }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="8">No consultations found.</td>
        </tr>
    @endforelse
</tbody>

        </table>
 
@endsection
