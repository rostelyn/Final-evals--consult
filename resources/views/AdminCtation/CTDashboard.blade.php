@extends('layouts.AdminConsult-layout')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ConsultationAdmin/CtDashboard.css') }}">

<body>
    <div class="container mt-5">
        <div class="dashboard-header" style="position: relative;">
            <h2>Consultation System</h2>
            <p>Academic Year: 2023-2024 1st Semester</p>
            <p>Consultation Status: On-going</p>
            <div style="position: absolute; top: 8px; right: 8px;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <button type="submit" class="logout">Log Out</button>
                </form>
            </div>
        </div>
        <div class="row card-container">
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                    <img src="{{ asset('css/CTResources/totalappointment.png') }}">
                    <h5>200</h5>
                    <p>Total Appointments</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                <img src="{{ asset('css/CTResources/upcoming.png') }}">
                    <h5>10</h5>
                    <p>Upcomingg Appointment</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                <img src="{{ asset('css/CTResources/pending.png') }}">
                    <h5>400</h5>
                    <p>Pending Appointment</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-card">
                 <img src="{{ asset('css/CTResources/notif.png') }}">
                    <h5>5</h5>
                    <p>Notifications</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
