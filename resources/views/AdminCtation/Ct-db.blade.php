@extends('layouts.AdminConsult-layout')

@section('content')

<div class="container">
    <div class="dashboard-header">
        <h2>Consultation Appointment Dashboard</h2>
        <p>Welcome</p>
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
</div>

<style>
    body {
        background-color: #f0f0f0; 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 22px; /* Increased font size */
    }

    .container {
        max-width: 1200px; /* Increased max-width */
        margin: 40px auto; /* Increased margin */
        padding: 60px; /* Increased padding */
        background: transparent; /* Removed background color */
        border-radius: 8px;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 20px; /* Increased margin */
    }

    .dashboard-header h2 {
        margin: 0;
        font-size: 48px; /* Increased font size */
        font-weight: bold;
        color: #333;
    }

    .dashboard-header p {
        margin: 10px 0; /* Increased margin */
        font-size: 28px; /* Increased font size */
        color: #666;
    }

    .dashboard-content {
        display: flex;
        flex-wrap: wrap;
        gap: 30px; /* Increased gap */
        justify-content: center;
    }

    .card {
        background: transparent; /* Removed background color */
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 40px; /* Increased padding */
        width: 100%;
        max-width: 400px; /* Increased max-width */
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
        top: -30px; /* Increased top */
        left: 50%;
        transform: translateX(-50%);
        background-color: #6C63FF; 
        color: #fff;
        width: 60px; /* Increased width */
        height: 60px; /* Increased height */
        line-height: 60px; /* Increased line-height */
        text-align: center;
        border-radius: 50%;
    }

    .card .icon i {
        font-size: 36px; /* Increased font size */
    }

    .card h3 {
        margin: 0 0 20px; /* Increased margin */
        font-size: 32px; /* Increased font size */
        color: #333;
    }

    .card p {
        margin: 0;
        font-size: 28px; /* Increased font size */
        color: #666;
    }

    .card ul {
        list-style: none;
        padding: 0;
        margin: 0;
        color: #666;
        text-align: left;
    }

    .card ul li {
        padding: 16px 0; /* Increased padding */
        border-bottom: 1px solid #eee;
        font-size: 26px; /* Increased font size */
    }

    .card ul li:last-child {
        border-bottom: none;
    }

    /* Card colors */
    .total-appointments {
        background: #09FF87;
    }

    .pending-appointments {
        background: #09FF87; 
    }

    .upcoming-appointments {
        background: #09FF87;
    }

    .notifications {
        background: #09FF87;
    }
</style>

@endsection
