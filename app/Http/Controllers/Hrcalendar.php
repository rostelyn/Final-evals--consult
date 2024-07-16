<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HrCalendar; // Import the HrCalendar model

class HrCalendarController extends Controller
{
    public function index()
    {
        // Fetch all hr calendar events from the database
        $hrcalendars = HrCalendar::all();

        // Pass hr calendar data to the view
        return view('consultant.calendar', compact('hrcalendars'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // Create a new event
        $hrCalendar = new HrCalendar();
        $hrCalendar->title = $request->input('title');
        $hrCalendar->description = $request->input('description');
        $hrCalendar->start = $request->input('start');
        $hrCalendar->end = (new \DateTime($request->input('start')))->modify('+30 minutes')->format('Y-m-d\TH:i');
        $hrCalendar->save();

        // Return a response
        return response()->json(['success' => true, 'hrCalendar' => $hrCalendar]);
    }
}
