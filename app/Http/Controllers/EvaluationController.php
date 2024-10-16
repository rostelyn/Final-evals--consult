<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
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

        Evaluation::create([
            'teacher_name' => $request->teacher_name,
            'subject' => $request->subject,
            'teaching_performance' => $request->teaching_performance,
            'library' => $request->library,
            'laboratory' => $request->laboratory,
            'comfort_room' => $request->comfort_room,
            'canteen' => $request->canteen,
        ]);

        return redirect()->back()->with('success', 'Evaluation submitted successfully!');
    }
    public function showEvaluations(Request $request)
    {
        // Get the teacher's name from the query string
        $teacherName = $request->query('teacher');
    
        // Fetch evaluations for the given teacher
        $evaluations = Evaluation::where('teacher_name', $teacherName)->get();

        $evaluations = Evaluation::all(); 
        return view('hr.HrCollegeBSIT.BSITThirdYear.hrStudentlis', compact('evaluations'));
    }
    
}
