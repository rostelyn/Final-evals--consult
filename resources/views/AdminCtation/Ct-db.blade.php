@extends('layouts.AdminConsult-layout')

@section('content')

<div class="dashboard">
    <div class="dashboard-header">
        <h2>Consultation Appointment Dashboard</h2>
    </div>

    <div class="dashboard-content">
        <div class="card total-appointments">
            <span class="icon"><i class="fas fa-calendar-check"></i></span>
            <h3>Total Appointments</h3>
            <p>45</p>
        </div>

        <div class="card pending-appointments">
            <span class="icon"><i class="fas fa-clock"></i></span>
            <h3>Pending Appointments</h3>
            <p>10</p>
        </div>

        <div class="card upcoming-appointments">
            <span class="icon"><i class="fas fa-calendar-alt"></i></span>
            <h3>Upcoming Appointments</h3>
            <ul>
                <li>Consultation 1</li>
                <li>Consultation 2</li>
                <li>Consultation 3</li>
                <li>Consultation 4</li>
            </ul>
        </div>

        <div class="card notifications">
            <span class="icon"><i class="fas fa-bell"></i></span>
            <h3>Notifications</h3>
            <p>No new notifications.</p>
        </div>
    </div>

    <div class="dashboard-footer">
        <p>Welcome Admin</p>
    </div>
</div>

<style>
    body {
        background-color: #f0f0f0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 18px;
    }

    .dashboard {
        max-width: 1000px;
        margin: 0 auto; /* Removed top margin */
        padding: 0 50px 50px; /* Removed top padding */
        background: transparent;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 30px; /* Increased margin */
    }

    .dashboard-header h2 {
        margin: 0;
        font-size: 36px;
        font-weight: bold;
        color: #333;
    }

    .dashboard-content {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

    .dashboard-footer {
        text-align: center;
        margin-top: 20px;
    }

    .dashboard-footer p {
        font-size: 20px;
        color: #666;
    }

    .card {
        background: #4BC0C0; /* Vibrant Cyan */
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 30px;
        width: 100%;
        max-width: 350px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
        position: relative;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card .icon {
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #6C63FF;
        color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        border-radius: 50%;
    }

    .card .icon i {
        font-size: 28px;
    }

    .card h3 {
        margin: 0 0 15px;
        font-size: 24px;
        color: #333;
    }

    .card p, .card ul {
        margin: 0;
        font-size: 22px;
        color: #fff;
    }

    .card ul {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: left;
    }

    .card ul li {
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        font-size: 20px;
    }

    .card ul li:last-child {
        border-bottom: none;
    }
</style>

@endsection
