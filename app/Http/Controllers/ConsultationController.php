<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\BusySlot;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function showCollegeConsultation()
    {
        return view('student.consultation.CollegeConsult');
    }

    public function showHSchoolConsultation()
    {
        return view('student.consultation.HSchoolConsult');
    }

    public function submitConsultation(Request $request)
    {
        // Validate the form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'purpose' => 'required|string',
            'consultant' => 'required|string',
            'meeting_mode' => 'required|string',
            'online_platform' => 'nullable|string',
            'schedule_date' => 'required|date',
            'schedule_time' => 'required',
        ]);

        // Create a full schedule datetime
        $validated['schedule'] = $validated['schedule_date'] . ' ' . $validated['schedule_time'];
        unset($validated['schedule_date'], $validated['schedule_time']);
        $validated['student_id'] = auth()->id(); // Store the student ID

        // Save the consultation request to the database
        Consultation::create($validated);

        // Return JSON response for the success modal
        return response()->json([
            'success' => true,
            'message' => 'Consultation request sent to ' . ($validated['consultant'] === 'department_head' ? 'Department Head' : 'Admin Consultant') . ' for approval.'
        ]);
    }




    
public function dpHeadApproval()
{
    // Fetch only pending consultations for the department head
    $consultations = Consultation::where('status', 'pending')
                                 ->where('consultant', 'department_head')
                                 ->get();

    return view('DpHead.DpApproval', compact('consultations'));
}

public function adminCtationApproval()
{
    // Fetch only pending consultations for the admin consultant
    $consultations = Consultation::where('status', 'pending')
                                 ->where('consultant', 'admin_consultant')
                                 ->get();

    return view('AdminCtation.CtApproval', compact('consultations'));
}



public function adminCalendar()
{
    $consultations = Consultation::where('status', 'approved')
                                  ->where('consultant', 'admin_consultant')
                                  ->get();
    $busySlots = BusySlot::all();

    return view('AdminCtation.CtCalendar', compact('consultations', 'busySlots'));
}

public function dpCalendar()
{
    $consultations = Consultation::where('status', 'approved')
                                  ->where('consultant', 'department_head')
                                  ->get();
    $busySlots = BusySlot::all();

    return view('DpHead.DpCalendar', compact('consultations', 'busySlots'));
}


public function studentCalendar()
{
    // Retrieve only approved consultations for the authenticated student
    $consultations = Consultation::where('status', 'approved')
                                  ->where('student_id', auth()->id()) // Only show consultations for this student
                                  ->get();

    return view('student.StudentCalendar', compact('consultations'));
}

public function storeBusySlot(Request $request)
{
    // Validate inputs
    $validated = $request->validate([
        'date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
        'whole_day' => 'nullable|boolean',
    ]);

    // Check if the busy slot already exists for the selected date
    $existingSlot = BusySlot::where('date', $validated['date'])
        ->where('start_time', $validated['start_time'])
        ->first();

    if ($existingSlot) {
        return response()->json(['success' => false, 'message' => 'The slot is already taken.']);
    }

    // Store the busy slot if all checks pass
    $busySlot = new BusySlot();
    $busySlot->date = $validated['date'];
    $busySlot->start_time = $validated['start_time'];
    $busySlot->end_time = $validated['end_time'];
    $busySlot->whole_day = $validated['whole_day'] ?? false;
    $busySlot->save();

    return response()->json(['success' => true, 'message' => 'Your busy slot has been saved.']);
}




    // New History Methods
    public function adminHistory()
{
    // Include declined consultations
    $consultations = Consultation::where('consultant', 'admin_consultant')
                                  ->whereIn('status', ['approved', 'declined'])
                                  ->get();

    return view('AdminCtation.Cthistory', compact('consultations'));
}

public function dpHistory()
{
    // Include declined consultations
    $consultations = Consultation::where('consultant', 'department_head')
                                  ->whereIn('status', ['approved', 'declined'])
                                  ->get();

    return view('DpHead.DpHistory', compact('consultations'));
}

public function studentHistory()
{
    // Include declined consultations for the student
    $consultations = Consultation::where('student_id', auth()->id())
                                  ->whereIn('status', ['approved', 'declined'])
                                  ->get();

    return view('student.StudentHistory', compact('consultations'));
}


public function accept($id)
{
    // Find the consultation by ID
    $consultation = Consultation::findOrFail($id);
    
    // Change the status to 'approved'
    $consultation->status = 'approved';
    $consultation->save();

    // Redirect to the appropriate calendar view based on the consultant type
    if ($consultation->consultant === 'department_head') {
        // Redirect to the Department Head calendar view
        return redirect()->route('dp.calendar')
                         ->with('success', 'Consultation has been approved by Department Head and added to the calendar.');
    } elseif ($consultation->consultant === 'admin_consultant') {
        // Redirect to the Admin Consultant calendar view
        return redirect()->route('admin.calendar')
                         ->with('success', 'Consultation has been approved by Admin Consultant and added to the calendar.');
    }

    // Fallback if the consultant type is unexpected
    return redirect()->back()->with('error', 'Consultant type not recognized.');
}

public function decline(Request $request, $id)
{
    $request->validate([
        'decline_reason' => 'required|string|max:255',
    ]);

    $consultation = Consultation::findOrFail($id);
    $consultation->status = 'declined'; // Set the status to declined
    $consultation->decline_reason = $request->input('decline_reason'); // Save the decline reason
    $consultation->save();

    if ($consultation->consultant === 'department_head') {
        return redirect()->route('dpHead.approval')
                         ->with('success', 'Consultation has been declined.');
    } elseif ($consultation->consultant === 'admin_consultant') {
        return redirect()->route('adminCtation.approval')
                         ->with('success', 'Consultation has been declined.');
    }

    return redirect()->back()->with('error', 'Consultant type not recognized.');
}
    
}
