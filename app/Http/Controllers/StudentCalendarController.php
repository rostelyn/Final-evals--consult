<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentCalendarController extends Controller
{
    public function index()
    {
        return view('student.evaluation.student-calendar.index');
    }

    public function events()
    {
        // Retrieve events from the database or define them statically for now
        $events = [
            ['title' => 'Event 1', 'start' => '2024-07-20'],
            ['title' => 'Event 2', 'start' => '2024-07-22'],
        ];

        return response()->json($events);
    }
}
