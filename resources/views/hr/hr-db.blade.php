@extends('layouts.hr-layout')

@section('content')
<div class="dashboard">
    <div class="dashboard-header">
        <h2>Evaluation Dashboard</h2>
    </div>

    <div class="dashboard-content">
        <div class="card total-evaluations">
            <span class="icon"><i class="fas fa-clipboard-list"></i></span>
            <h3>Total Evaluations</h3>
            <p>20</p>
        </div>

        <div class="card pending-evaluations">
            <span class="icon"><i class="fas fa-clock"></i></span>
            <h3>Pending Evaluations</h3>
            <p>5</p>
        </div>

        <div class="card recent-evaluations">
            <span class="icon"><i class="fas fa-history"></i></span>
            <h3>Recent Evaluations</h3>
            <ul>
                <li>Evaluation 1</li>
                <li>Evaluation 2</li>
                <li>Evaluation 3</li>
                <li>Evaluation 4</li>
                <li>Evaluation 5</li>
            </ul>
        </div>

        <div class="card notifications">
            <span class="icon">icon<i class="fas fa-bell"></i></span>
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

    .dashboard-header {
        text-align: center;
        margin-bottom: 30px;
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
        background: transparent;
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

    .total-evaluations {
        background: #4BC0C0;
    }

    .pending-evaluations {
        background: #4BC0C0; 
    }

    .recent-evaluations {
        background: #4BC0C0; 
    }

    .notifications {
        background: #4BC0C0; /* Vibrant Cyan */
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
