<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HRBSITController extends Controller
{
    // Method to list students by section
    public function listStudentsBySection($course_strand = 'BSIT', $section = null)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }
    
        // Get the current user's role
        $userRole = auth()->user()->role;
    
        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrCollegeBSIT.BSITFirstYear.HrBSIT101',
                '102' => 'hr.HrCollegeBSIT.BSITFirstYear.HrBSIT102',
                '103' => 'hr.HrCollegeBSIT.BSITFirstYear.HrBSIT103',
                '201' => 'hr.HrCollegeBSIT.BSITSecondYear.HrBSIT201',
                '202' => 'hr.HrCollegeBSIT.BSITSecondYear.HrBSIT202',
                '203' => 'hr.HrCollegeBSIT.BSITSecondYear.HrBSIT203',
                '301' => 'hr.HrCollegeBSIT.BSITThirdYear.HrBSIT301',
                '302' => 'hr.HrCollegeBSIT.BSITThirdYear.HrBSIT302',
                '303' => 'hr.HrCollegeBSIT.BSITThirdYear.HrBSIT303',
                '401' => 'hr.HrCollegeBSIT.BSITFourthYear.HrBSIT401',
                '402' => 'hr.HrCollegeBSIT.BSITFourthYear.HrBSIT402',
                '403' => 'hr.HrCollegeBSIT.BSITFourthYear.HrBSIT403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtBsit.CtBSITFirstYear.ConsultationBsit101',
                '102' => 'AdminCtation.CtBsit.CtBSITFirstYear.ConsultationBsit102',
                '103' => 'AdminCtation.CtBsit.CtBSITFirstYear.ConsultationBsit103',
                '201' => 'AdminCtation.CtBsit.CtBSITSecondYear.ConsultationBsit201',
                '202' => 'AdminCtation.CtBsit.CtBSITSecondYear.ConsultationBsit202',
                '203' => 'AdminCtation.CtBsit.CtBSITSecondYear.ConsultationBsit203',
                '301' => 'AdminCtation.CtBsit.CtBSITThirdYear.ConsultationBsit301',
                '302' => 'AdminCtation.CtBsit.CtBSITThirdYear.ConsultationBsit302',
                '303' => 'AdminCtation.CtBsit.CtBSITThirdYear.ConsultationBsit303',
                '401' => 'AdminCtation.CtBsit.CtBSITFourthYear.ConsultationBsit401',
                '402' => 'AdminCtation.CtBsit.CtBSITFourthYear.ConsultationBsit402',
                '403' => 'AdminCtation.CtBsit.CtBSITFourthYear.ConsultationBsit403',
            ],
        ];
    
        // Dynamically set the section based on the route name
        if ($section === null) {
            $section = str_replace('BSIT', '', request()->route()->getName());
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
    
    
    public function showHrProfile($id)
    {
        $student = Student::where('StudentId', $id)->first();
        
        if (!$student) {
            return redirect()->route('BSIT.list')->with('error', 'Student not found.');
        }

        return view('hr.HrCollegeBSIT.HrProfile', compact('student'));
    }

    // Show Ctadmin profile
    public function showCtProfile($id)
    {
        $student = Student::where('StudentId', $id)->first();
        
        if (!$student) {
            return redirect()->route('BSIT.list')->with('error', 'Student not found.');
        }

        return view('AdminCtation.CtProfile', compact('student'));
    }

    // Show a single student profile
    public function show($id)
    {
        // Fetch the student by StudentId
        $student = Student::where('StudentId', $id)->first();

        // Check if a student was found
        if (!$student) {
            return redirect()->route('BSIT101') // Use the route name for the student list
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
