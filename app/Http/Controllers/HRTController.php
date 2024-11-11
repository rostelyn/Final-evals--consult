<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HRTController extends Controller
{
    // Method to list students by section
    public function listStudentsBySection($course_strand = 'HRT', $section = null)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrHRT.HRTFirstYear.HRT101',
                '102' => 'hr.HrHRT.HRTFirstYear.HRT102',
                '103' => 'hr.HrHRT.HRTFirstYear.HRT103',
                '201' => 'hr.HrHRT.HRTSecondYear.HRT201',
                '202' => 'hr.HrHRT.HRTSecondYear.HRT202',
                '203' => 'hr.HrHRT.HRTSecondYear.HRT203',
                '301' => 'hr.HrHRT.HRTThirdYear.HRT301',
                '302' => 'hr.HrHRT.HRTThirdYear.HRT302',
                '303' => 'hr.HrHRT.HRTThirdYear.HRT303',
                '401' => 'hr.HrHRT.HRTFourthYear.HRT401',
                '402' => 'hr.HrHRT.HRTFourthYear.HRT402',
                '403' => 'hr.HrHRT.HRTFourthYear.HRT403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtHrt.CtHRTFirstYear.ConsultationHrt101',
                '102' => 'AdminCtation.CtHrt.CtHRTFirstYear.ConsultationHrt102',
                '103' => 'AdminCtation.CtHrt.CtHRTFirstYear.ConsultationHrt103',
                '201' => 'AdminCtation.CtHrt.CtHRTSecondYear.ConsultationHrt201',
                '202' => 'AdminCtation.CtHrt.CtHRTSecondYear.ConsultationHrt202',
                '203' => 'AdminCtation.CtHrt.CtHRTSecondYear.ConsultationHrt203',
                '301' => 'AdminCtation.CtHrt.CtHRTThirdYear.ConsultationHrt301',
                '302' => 'AdminCtation.CtHrt.CtHRTThirdYear.ConsultationHrt302',
                '303' => 'AdminCtation.CtHrt.CtHRTThirdYear.ConsultationHrt303',
                '401' => 'AdminCtation.CtHrt.CtHRTFourthYear.ConsultationHrt401',
                '402' => 'AdminCtation.CtHrt.CtHRTFourthYear.ConsultationHrt402',
                '403' => 'AdminCtation.CtHrt.CtHRTFourthYear.ConsultationHrt403',
            ],
        ];

        // Dynamically set the section based on the route name if not provided
        if ($section === null) {
            $section = str_replace('HRT', '', request()->route()->getName());
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
            return redirect()->route('HRT101.list')->with('error', 'Student not found.');
        }

        return view('hr.HrHRT.HrProfile', compact('student'));
    }

    // Show Ctadmin profile
    public function showCtProfile($id)
    {
        $student = Student::where('StudentId', $id)->first();

        if (!$student) {
            return redirect()->route('HRT101.list')->with('error', 'Student not found.');
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
            return redirect()->route('HRT101.list') // Use the route name for the student list
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
