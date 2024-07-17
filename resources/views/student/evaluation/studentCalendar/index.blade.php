<!-- resources/views/student/evaluation/studentCalendar/index.blade.php -->
@extends('layouts.evaluation-layout')

@section('content')
<div class="container">
    <h1>Student Calendar</h1>
    <div id="calendar">
        <!-- Calendar will be displayed here -->
        @if(!empty($events))
            @foreach($events as $event)
                <p>{{ $event['name'] }} - {{ $event['date'] }}</p>
            @endforeach
        @else
            <p>No events available.</p>
        @endif
    </div>
</div>
@endsection
