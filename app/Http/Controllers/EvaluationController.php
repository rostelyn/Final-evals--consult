<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    // Submit evaluation form
    public function submit(Request $request)
    {
        $request->validate([
            'teacher_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'teaching_performance' => 'required|string',
            'library' => 'required|string',
            'laboratory' => 'required|string',
            'comfort_room' => 'required|string',
            'canteen' => 'required|string',
        ]);

        // Create a new evaluation and automatically set its status to 'evaluated'
        Evaluation::create([
            'teacher_name' => $request->teacher_name,
            'subject' => $request->subject,
            'teaching_performance' => $request->teaching_performance,
            'library' => $request->library,
            'laboratory' => $request->laboratory,
            'comfort_room' => $request->comfort_room,
            'canteen' => $request->canteen,
            'status' => 'evaluated', // Set the status as evaluated
        ]);

        return redirect()->back()->with('success', 'Evaluation submitted successfully!');
    }

    // Show evaluations based on teacher name
    public function showEvaluations(Request $request)
    {
        $teacherName = $request->query('teacher');
        $evaluations = Evaluation::when($teacherName, function ($query, $teacherName) {
            return $query->where('teacher_name', $teacherName);
        })->get();

        return view('hr.HrCollegeBSIT.BSITThirdYear.hrStudentlist', compact('evaluations'));
    }
}
