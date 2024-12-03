@extends('layouts.HrLayout')

@section('content')
<style>
.container {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


h2 {
    font-family: 'Arial', sans-serif;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Form Styling */
form {
    background-color: #fff;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

form .row {
    margin: 0;
}

form input[type="text"], 
form input[type="date"] {
    font-size: 16px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
}

form button {
    font-size: 16px;
    font-weight: bold;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}

/* Alert Styles */
.alert {
    padding: 15px;
    margin: 10px 0;
    border-radius: 5px;
    font-size: 16px;
}

.alert-warning {
    background-color: #fff3cd;
    color: #856404;
    border: 1px solid #ffeeba;
}

.alert-light {
    background-color: #f8f9fa;
    color: #6c757d;
    border: 1px solid #f8f9fa;
}

/* List Styling */
.alert ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
}

.alert ul li {
    margin: 5px 0;
    padding: 8px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.alert ul li strong {
    color: #333;
}

/* Media Query for Mobile Responsiveness */
@media (max-width: 768px) {
    .col-md-4 {
        margin-bottom: 15px;
    }

    .col-md-12 {
        text-align: center;
    }

    form button {
        width: 100%;
    }

    
}
</style>
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
