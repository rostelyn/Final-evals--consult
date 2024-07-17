<?php

// app/Http/Controllers/ConsultationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class ConsultationController extends Controller
{
    // Existing methods (if any)

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
        return view('AdminCtation.Ct-appdis', compact('appointments'));
    }

    /**
     * Store a newly created appointment in storage.
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

        // Create a new appointment
        Appointment::create($request->all());

        // Redirect with a success message
        return redirect()->back()->with('success', 'Appointment confirmed successfully.');
    }
}



