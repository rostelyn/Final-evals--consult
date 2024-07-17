<?php

// app/Http/Controllers/StudentCalendarController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentCalendarController extends Controller
{
    public function index()
    {
        // Define the $events variable
        $events = [
            // Example events
            ['name' => 'Event 1', 'date' => '2024-07-20'],
            ['name' => 'Event 2', 'date' => '2024-07-21'],
            // Add your actual events logic here
        ];

        return view('student.evaluation.studentCalendar.index', compact('events'));
    }
}
