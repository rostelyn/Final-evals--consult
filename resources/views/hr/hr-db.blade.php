@extends('layouts.hr-layout')

@section('content')
<div class="container">
    <div class="dashboard-header">
        <h2>Evaluation Dashboard</h2>
        <p>Welcome Admin</p>
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
    }

    .container {
        max-width: 900px;
        margin: 20px auto;
        padding: 20px;
        background: #fff; 
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .dashboard-header h2 {
        margin: 0;
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }

    .dashboard-header p {
        margin: 5px 0;
        font-size: 16px;
        color: #666;
    }

    .dashboard-content {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        width: 100%;
        max-width: 300px;
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
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #6C63FF; /* Purple */
        color: #fff;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
    }

    .card .icon i {
        font-size: 24px;
    }

    .card h3 {
        margin: 0 0 10px;
        font-size: 20px;
        color: #333;
    }

    .total-evaluations {
        background: #09FF87; /* Geen Something */
    }

    .pending-evaluations {
        background: #FF6584; /* Coral */
    }

    .recent-evaluations {
        background: #28B5B5; /* Teal */
    }

    .notifications {
        background: #FFC107; /* Amber */
    }
    .card p {
        margin: 0;
        font-size: 18px;
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
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .card ul li:last-child {
        border-bottom: none;
    }
</style>

@endsection
