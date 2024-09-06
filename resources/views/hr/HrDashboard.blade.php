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
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                    <img src="{{ asset('css/HRResources/totalstudents.png') }}">
                    <h5>1000</h5>
                    <p>Total Students</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                <img src="{{ asset('css/HRResources/evals.png') }}">
                    <h5>500</h5>
                    <p>Total Evaluations</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                <img src="{{ asset('css/HRResources/recent.png') }}">
                    <h5>50</h5>
                    <p>Recent Evaluations</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                 <img src="{{ asset('css/HRResources/pending.png') }}">
                    <h5>30</h5>
                    <p>Pending Evaluation</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                 <img src="{{ asset('css/HRResources/notif.png') }}">
                    <h5>5</h5>
                    <p>Notifications</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
