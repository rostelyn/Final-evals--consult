<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ACTController extends Controller
{
    // Method to list students by section
    public function listStudentsBySection($course_strand = 'ACT', $section = null)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrACT.ACTFirstYear.ACT101',
                '102' => 'hr.HrACT.ACTFirstYear.ACT102',
                '103' => 'hr.HrACT.ACTFirstYear.ACT103',
                '201' => 'hr.HrACT.ACTSecondYear.ACT201',
                '202' => 'hr.HrACT.ACTSecondYear.ACT202',
                '203' => 'hr.HrACT.ACTSecondYear.ACT203',
                '301' => 'hr.HrACT.ACTThirdYear.ACT301',
                '302' => 'hr.HrACT.ACTThirdYear.ACT302',
                '303' => 'hr.HrACT.ACTThirdYear.ACT303',
                '401' => 'hr.HrACT.ACTFourthYear.ACT401',
                '402' => 'hr.HrACT.ACTFourthYear.ACT402',
                '403' => 'hr.HrACT.ACTFourthYear.ACT403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtAct.CtACTFirstYear.ConsultationAct101', // Updated view for ConsultationAct101
                '102' => 'AdminCtation.CtAct.CtACTFirstYear.ConsultationAct102',
                '103' => 'AdminCtation.CtAct.CtACTFirstYear.ConsultationAct103',
                '201' => 'AdminCtation.CtAct.CtACTSecondYear.ConsultationAct201',
                '202' => 'AdminCtation.CtAct.CtACTSecondYear.ConsultationAct202',
                '203' => 'AdminCtation.CtAct.CtACTSecondYear.ConsultationAct203',
                '301' => 'AdminCtation.CtAct.CtACTThirdYear.ConsultationAct301',
                '302' => 'AdminCtation.CtAct.CtACTThirdYear.ConsultationAct302',
                '303' => 'AdminCtation.CtAct.CtACTThirdYear.ConsultationAct303',
                '401' => 'AdminCtation.CtAct.CtACTFourthYear.ConsultationAct401',
                '402' => 'AdminCtation.CtAct.CtACTFourthYear.ConsultationAct402',
                '403' => 'AdminCtation.CtAct.CtACTFourthYear.ConsultationAct403',
            ],
        ];

        // Dynamically set the section based on the route name if not provided
        if ($section === null) {
            $section = str_replace('ACT', '', request()->route()->getName());
        }

        // Get the view based on the user role and section
        $view = $views[$userRole][$section] ?? null;

        if (!$view || !view()->exists($view)) {
            abort(404, "View not found for section: $section and role: $userRole");
        }

        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        return view($view, compact('students'));
    }

    // Show Hradmin profile
    public function showHrProfile($id)
    {
        $student = Student::where('StudentId', $id)->first();
        
        if (!$student) {
            return redirect()->route('ACT.list')->with('error', 'Student not found.');
        }

        return view('hr.HrCollegeACT.HrProfile', compact('student'));
    }

    // Show Ctadmin profile
    public function showCtProfile($id)
    {
        $student = Student::where('StudentId', $id)->first();
        
        if (!$student) {
            return redirect()->route('ACT.list')->with('error', 'Student not found.');
        }

        return view('AdminCtation.CtProfile', compact('student'));
    }

    // Show a single student profile based on user role
    public function show($id)
    {
        // Fetch the student by StudentId
        $student = Student::where('StudentId', $id)->first();

        // Check if a student was found
        if (!$student) {
            return redirect()->route('ACT101') // Use the route name for the student list
                ->with('error', 'Student not found.');
        }

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Load different views based on the role
        if ($userRole === 'Hradmin') {
            return view('hr.HrCollegeBSIT.HrProfile', compact('student'));
        } elseif ($userRole === 'Ctadmin') {
            return view('AdminCtation.CtProfile', compact('student'));
        } else {
            abort(404, "Profile view not found for role: $userRole");
        }
    }
}
