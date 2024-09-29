<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;  // Import the Consultation model
use App\Models\BusyTime;      // Import the BusyTime model
use Carbon\Carbon;

class ConsultController extends Controller
{
    // Show the consultation form
    public function showConsultForm()
    {
        // Fetch all consultations with pending or approved status (booked times)
        $bookedTimes = Consultation::whereIn('status', ['pending', 'approved'])
            ->pluck('schedule')
            ->map(function ($schedule) {
                return Carbon::parse($schedule)->format('Y-m-d\TH:i');  // Format for datetime-local input
            })
            ->toArray();

        // Fetch busy events
        $busyTimes = BusyTime::get()
            ->map(function ($event) {
                return [
                    'from' => Carbon::parse($event->schedule_from)->format('Y-m-d\TH:i'),
                    'to' => Carbon::parse($event->schedule_to)->format('Y-m-d\TH:i'),
                    'is_all_day' => $event->is_all_day,
                ];
            })
            ->toArray();

        // Pass both bookedTimes and busyTimes to the view
        return view('student.consultation.consult', compact('bookedTimes', 'busyTimes')); // Updated path
    }

    // Submit a new consultation
    public function submitConsult(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'meeting_mode' => 'required|string|max:255',
            'schedule' => 'required|date_format:Y-m-d\TH:i',  // Validate 'datetime-local' input
        ]);

        // Parse the schedule date and time
        $scheduleDateTime = Carbon::parse($request->schedule);

        // Ensure the selected time is within business hours (8 AM - 5 PM)
        if ($scheduleDateTime->hour < 8 || $scheduleDateTime->hour >= 17) {
            return back()->withErrors(['schedule' => 'Consultations can only be scheduled between 8 AM and 5 PM.']);
        }

        // Check if the selected time slot is already taken (overlap prevention)
        $conflict = Consultation::whereDate('schedule', $scheduleDateTime->toDateString())
            ->whereTime('schedule', $scheduleDateTime->format('H:i'))
            ->exists();

        // Return an error message if the time slot is already taken
        if ($conflict) {
            return back()->withErrors(['schedule' => 'The selected time slot is already taken. Please choose another.']);
        }

        // Check if department is "Admin Consultant"
        if ($request->department !== 'Admin Consultant') {
            // If the department is not "Admin Consultant", deny submission
            return back()->withErrors(['department' => 'Consultations are only allowed for the Admin Consultant department.']);
        }

        // Handle logic specifically for "Admin Consultant"
        Consultation::create([
            'name' => $request->name,
            'course' => $request->course,
            'purpose' => $request->purpose,
            'department' => 'Admin Consultant',  // Store as Admin Consultant
            'meeting_mode' => $request->meeting_mode,
            'meeting_preference' => $request->meeting_mode === 'Online' ? $request->meeting_preference : null,
            'schedule' => $scheduleDateTime,
            'status' => 'pending',  // Default status as 'pending'
        ]);

        // Redirect back with success message
        return redirect()->route('consult.form')->with('success', 'Consultation request submitted. Awaiting approval.');
    }

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

        // Pass the current date and consultations to the calendar view
        return view('AdminCtation.calendar', compact('currentDate', 'consultations')); // Updated path
    }

    // Show approval page
    public function showApproval()
{
    $consults = Consultation::where('status', 'pending')->get(); // Ensure this line is correct
    return view('AdminCtation.approval', compact('consults'));
}


    // Approve a consultation
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

    


    // Decline a consultation and capture the reason
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

    // Show consultation history (approved or declined)
    public function showHistory()
    {
        // Fetch consultations that are approved or declined
        $history = Consultation::whereIn('status', ['approved', 'declined'])->get();

        // Pass the consultations to the history view
        return view('AdminCtation.ConsultHistory', compact('history')); // Updated path
    }
    

}
