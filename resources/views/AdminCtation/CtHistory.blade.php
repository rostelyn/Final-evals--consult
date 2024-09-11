@extends('layouts.AdminConsult-layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/Cthistory.css') }}">

<div class="container">
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <div class="appointment-history">
        <h2>APPOINTMENT HISTORY</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name:</th>
                        <th>COURSE/GRADE LEVEL/SECTION:</th>
                        <th>Purpose</th>
                        <th>Meeting Mode</th>
                        <th>Meeting Preference</th>
                        <th>Date / Time</th>
                        <th>Action (approved or disapproved)</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 5; $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>Student Name {{ $i }}</td>
                            <td>Course {{ $i }}</td>
                            <td>Consultation</td>
                            <td>Online</td>
                            <td>Video Call</td>
                            <td>2023-09-0{{ $i }} 10:00 AM</td>
                            <td>Approved</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="action-buttons">
            <button class="btn btn-danger" id="deleteBtn">Delete</button>
            <button class="btn btn-primary" id="savePdfBtn">Save PDF</button>
            <button class="btn btn-secondary" id="printBtn">Print</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('deleteBtn').addEventListener('click', function() {
        if(confirm('Are you sure you want to delete the selected records?')) {
            // Add delete functionality here
            console.log('Delete button clicked');
        }
    });

    document.getElementById('savePdfBtn').addEventListener('click', function() {
        // Add save PDF functionality here
        console.log('Save PDF button clicked');
    });

    document.getElementById('printBtn').addEventListener('click', function() {
        window.print();
    });
</script>
@endsection