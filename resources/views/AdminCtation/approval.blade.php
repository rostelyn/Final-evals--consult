@extends('layouts.AdminConsult-layout')

@section('title', 'Approval Page')

@section('content')
<div class="container">
    <h2>Consultation Approval Page</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display Pending Consultations -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Purpose</th>
                <th>Meeting Mode</th>
                <th>Meeting Preference</th>
                <th>Date / Time</th>
                <th>Status</th> <!-- Status Column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consults as $consult)
            <tr id="consult-{{ $consult->id }}">
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
                    <!-- Accept button -->
                    <form id="approveForm{{ $consult->id }}" action="{{ $consult->type === 'highschool' ? route('highschoolconsult.approve', $consult->id) : route('consult.approve', $consult->id) }}" method="POST" style="display:inline;">
    @csrf
    @if($consult->status == 'pending') <!-- Only show if still pending -->
        <button type="button" class="btn btn-success" onclick="approveConsultation({{ $consult->id }})">Accept</button>
    @endif
</form>


                    <!-- Decline button -->
                    @if($consult->status == 'pending') <!-- Only show if still pending -->
                    <button class="btn btn-danger" onclick="showDeclineReason({{ $consult->id }})">Decline</button>
                    @endif

                    <div id="declineReason{{ $consult->id }}" style="display:none;">
                        <form action="{{ route('consult.decline', $consult->id) }}" method="POST">
                            @csrf
                            <input type="text" name="decline_reason" placeholder="Reason for decline" required>
                            <button type="submit" class="btn btn-danger">Submit Decline</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for success message -->
<div class="modal fade" id="approveSuccessModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Approval Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>The consultation has been accepted successfully!</p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to handle Approve and Decline actions -->
<script>
    // Show success modal for approval
    function approveConsultation(id) {
        $('#approveSuccessModal').modal('show');
        setTimeout(function() {
            $('#approveSuccessModal').modal('hide');
        }, 3000);
        setTimeout(function() {
            document.getElementById('approveForm' + id).submit();
        }, 3000);
    }

    // Show decline reason input
    function showDeclineReason(id) {
        document.getElementById('declineReason' + id).style.display = 'block';
    }
</script>
@endsection
