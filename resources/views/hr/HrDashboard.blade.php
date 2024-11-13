@extends('layouts.HrLayout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/EvaluationAdmin/HrDashboard.css') }}">

    <body>
        <div class="container mt-5">
            <div class="dashboard-header" style="position: relative;">
                <h2>Evaluation System</h2>
                <p>Academic Year: 2023-2024 1st Semester</p>
                <p>Evaluation Status: On-going</p>
                <div style="position: absolute; top: 8px; right: 8px;">
                    <a href="{{ route('logout') }}"><h5>Log Out</h5></a>
                </div>
            </div>

            <div class="row card-container">
                <!-- Total Students -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-card">
                        <img src="{{ asset('css/HRResources/totalstudents.png') }}">
                        <h5>{{ $studentCount }}</h5>
                        <p>Total Students</p>
                    </div>
                </div>

                <!-- Total Evaluations -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-card">
                        <img src="{{ asset('css/HRResources/evals.png') }}">
                        <h5>{{ $evaluationCount }}</h5>
                        <p>Total Evaluations</p>
                    </div>
                </div>

                <!-- Recent Evaluations -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-card">
                        <img src="{{ asset('css/HRResources/recent.png') }}">
                        <h5>{{ $recentEvaluationsCount > 0 ? $recentEvaluationsCount : 'No Recent Evaluations' }}</h5>
                        <p>Recent Evaluations</p>
                    </div>
                </div>

                <!-- Pending Evaluations -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-card">
                        <img src="{{ asset('css/HRResources/pending.png') }}">
                        <h5>{{ $pendingEvaluationsCount }} / {{ $studentCount }}</h5>
                        <p>Pending Evaluations</p>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="col-lg-3 col-md-6">
                    <div class="dashboard-card">
                        <img src="{{ asset('css/HRResources/notif.png') }}">
                        <h5>{{ $notificationCount > 0 ? $notificationCount : 'No Notifications' }}</h5>
                        <p>Notifications</p>
                    </div>
                </div>
            </div>

            <!-- Display Notifications if there are any -->
            @if($notificationCount > 0)
                <div class="alert alert-warning mt-4">
                    <strong>Notifications:</strong>
                    <ul>
                        @foreach($notifications as $notification)
                            <li>
                                <strong>{{ $notification->teacher_name }}</strong> evaluation is pending for over 7 days.
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </body>
@endsection
