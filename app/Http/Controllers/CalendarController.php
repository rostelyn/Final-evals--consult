<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\BusyTime;
use Carbon\Carbon;

class CalendarController extends Controller
{
    // Show the consultation calendar
    public function showCalendar()
    {
        // Get the current date for calendar display
        $currentDate = Carbon::now();
        $month = $currentDate->month;
        $year = $currentDate->year;

        // Fetch all consultations scheduled for the current month
        $consultations = Consultation::whereMonth('schedule', $month)
            ->whereYear('schedule', $year)
            ->get();

        // Fetch all busy times scheduled for the current month
        $busyEvents = BusyTime::whereMonth('schedule_from', $month)
            ->whereYear('schedule_from', $year)
            ->get();

        // Pass the consultations and busy events to the view
        return view('AdminCtation.calendar', compact('currentDate', 'consultations', 'busyEvents')); // Updated path
    }

    // Method to create a busy event
    public function createBusyEvent(Request $request)
    {
        // Validate the busy event form
        $request->validate([
            'busyDate' => 'required|date',
            'busyFromTime' => 'required_if:busyAllDay,false|nullable|date_format:H:i',
            'busyToTime' => 'required_if:busyAllDay,false|nullable|date_format:H:i',
            'reason' => 'required|string|max:255',
        ]);

        // Combine the date with the time for the "from" and "to" fields
        $busyFromDateTime = Carbon::parse($request->busyDate . ' ' . $request->busyFromTime);
        $busyToDateTime = Carbon::parse($request->busyDate . ' ' . $request->busyToTime);

        // If "Busy for the Whole Day" is checked, set busyFrom and busyTo for the whole day
        if ($request->has('busyAllDay')) {
            $busyFromDateTime = Carbon::parse($request->busyDate)->startOfDay()->addHours(8); // Start at 8:00 AM
            $busyToDateTime = Carbon::parse($request->busyDate)->startOfDay()->addHours(17); // End at 5:00 PM
        }

        // Save the new busy time
        BusyTime::create([
            'schedule_from' => $busyFromDateTime,
            'schedule_to' => $busyToDateTime,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Busy hour created successfully.');
    }

    public function deleteBusyHour($id)
    {
        // Find the busy hour by ID and delete it
        $busyTime = BusyTime::findOrFail($id);
        $busyTime->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Busy hour deleted successfully.');
    }
}
