<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation; // Import the Consultation model
use App\Models\BusyTime; // Import the BusyTime model
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class HighSchoolConsultController extends Controller
{
    public function showHighSchoolConsultForm()
{
    $bookedTimes = Consultation::whereIn('status', ['pending', 'approved'])
        ->pluck('schedule')
        ->map(function ($schedule) {
            return Carbon::parse($schedule)->format('Y-m-d\TH:i');
        })
        ->toArray();

    $busyTimes = BusyTime::all()
        ->map(function ($event) {
            return [
                'from' => Carbon::parse($event->schedule_from)->format('Y-m-d\TH:i'),
                'to' => Carbon::parse($event->schedule_to)->format('Y-m-d\TH:i'),
                'is_all_day' => $event->is_all_day,
            ];
        })
        ->toArray();

    return view('student.consultation.highschool', compact('bookedTimes', 'busyTimes'));
}

public function submitHighSchoolConsult(Request $request)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'purpose' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'meeting_mode' => 'required|string|max:255',
        'schedule' => 'required|date_format:Y-m-d\TH:i',
    ]);

    // Parse the schedule date and time
    $scheduleDateTime = Carbon::parse($request->schedule);

    // Ensure the selected time is within business hours
    if ($scheduleDateTime->hour < 8 || $scheduleDateTime->hour >= 17) {
        return back()->withErrors(['schedule' => 'Consultations can only be scheduled between 8 AM and 5 PM.']);
    }

    // Check for schedule conflicts
    $conflict = Consultation::whereDate('schedule', $scheduleDateTime->toDateString())
        ->whereTime('schedule', $scheduleDateTime->format('H:i'))
        ->exists();

    if ($conflict) {
        return back()->withErrors(['schedule' => 'The selected time slot is already taken. Please choose another.']);
    }
    // Check if department is "Admin Consultant"
    if ($request->department !== 'Admin Consultant') {
        // If the department is not "Admin Consultant", deny submission
        return back()->withErrors(['department' => 'Consultations are only allowed for the Admin Consultant department.']);
    }

    // Store the consultation with a 'pending' status
    Consultation::create([
        'name' => $request->name,
        'course' => $request->course,
        'purpose' => $request->purpose,
        'department' => $request->department,
        'meeting_mode' => $request->meeting_mode,
        'meeting_preference' => $request->meeting_mode === 'Online' ? $request->meeting_preference : null,
        'schedule' => $scheduleDateTime,
        'status' => 'pending',  // Default status as 'pending'
    ]);

    // Redirect back to the form with a success message
    return redirect()->route('highschoolconsult.form')->with('success', 'Consultation request submitted. Awaiting approval.');
}
public function approveConsult($id)
{
    // Find the consultation
    $consultation = Consultation::findOrFail($id);
    
    // Update status
    $consultation->status = 'approved';
    $consultation->save();

    // Redirect to the calendar
    return redirect()->route('admin.approval')->with('success', 'Consultation approved successfully.');
}



public function declineConsult(Request $request, $id)
    {
        // Validate the decline reason
        $request->validate([
            'decline_reason' => 'required|string|max:255',
        ]);

        // Find the consultation by ID
        $consultation = Consultation::findOrFail($id);

        // Update the consultation status to declined and store the reason
        $consultation->status = 'declined';
        $consultation->decline_reason = $request->decline_reason;
        $consultation->save();

        // Redirect back to the approval page with a success message
        return redirect()->back()->with('success', 'Consultation declined successfully.');
    }

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

        // Pass the current date and consultations to the calendar view
        return view('AdminCtation.calendar', compact('currentDate', 'consultations')); // Updated path
    }


    // Show approval page
    public function showApproval()
    {
        $consults = Consultation::where('status', 'pending')->get();
        return view('AdminCtation.approval', compact('consults'));
    }

    // Show consultation history
    public function showHistory()
    {
        $history = Consultation::whereIn('status', ['approved', 'declined'])->get();
        return view('AdminCtation.ConsultHistory', compact('history'));
    }
}
