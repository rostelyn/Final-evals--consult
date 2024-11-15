@extends('layouts.HrLayout')

@section('content')

    <div class="container mt-5">
        <h2>Evaluation Notifications</h2>

        <!-- Search Form -->
        <form method="GET" action="{{ route('HrNotification') }}" class="mb-4">
            <div class="row">
                <!-- Search by Teacher Name -->
                <div class="col-md-4">
                    <input type="text" name="teacher_name" class="form-control" placeholder="Search by Teacher Name" value="{{ request('teacher_name') }}">
                </div>

                <!-- Search by Section -->
                <div class="col-md-4">
                    <input type="text" name="section" class="form-control" placeholder="Search by Section" value="{{ request('section') }}">
                </div>

                <!-- Search by Date -->
                <div class="col-md-4">
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        @if($notificationCount > 0)
            <div class="alert alert-warning mt-4">
                <strong>Notifications:</strong>
                <ul>
                    @foreach($notifications as $notification)
                        <li>
                            <strong>{{ $notification->teacher_name }}</strong> - 
                            {{ $notification->subject }} evaluation is pending.
                            (Submitted on {{ $notification->created_at->format('Y-m-d H:i:s') }})
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="alert alert-light">
                <strong>No new notifications at the moment.</strong>
            </div>
        @endif
    </div>
@endsection
