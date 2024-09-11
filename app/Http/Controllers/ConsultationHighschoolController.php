<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class ConsultationHigschoolController extends Controller
{
    // Existing methods (index, store)

    /**
     * Display a listing of the appointments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all appointments
        $appointments = Appointment::all();

        // Return the view with the appointments
        return view('AdminCtation.CtApprroveDisapprove', compact('highschoolappointments'));
    }

    /**
     * Store a newly created highschoolappointment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'meeting_mode' => 'required|string|max:255',
            'online_preference' => 'nullable|string|max:255',
            'schedule' => 'required|date',
        ]);

        // Create a new highschoolappointment
        Appointment::create($request->all());

        // Redirect with a success message
        return redirect()->back()->with('success', 'Appointment confirmed successfully.');
    }

    /**
     * Approve the specified highschoolappointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $highschoolappointment = Appointment::findOrFail($id);
        $highschoolappointment->status = 'approved';
        $highschoolappointment->save();

        return redirect()->back()->with('success', 'Consultation approved successfully.');
    }

    /**
     * Disapprove the specified highschoolappointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disapprove($id)
    {
        $highschoolappointment = Appointment::findOrFail($id);
        $highschoolappointment->status = 'disapproved';
        $highschoolappointment->save();

        return redirect()->back()->with('success', 'Consultation disapproved successfully.');
    }
}