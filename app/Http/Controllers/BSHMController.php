<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BSHMController extends Controller
{
    // Method to list students by section
    public function listStudentsBySection($course_strand = 'BSHM', $section = null)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrBSHM.BSHMFirstYear.HM101',
                '102' => 'hr.HrBSHM.BSHMFirstYear.HM102',
                '103' => 'hr.HrBSHM.BSHMFirstYear.HM103',
                '201' => 'hr.HrBSHM.BSHMSecondYear.HM201',
                '202' => 'hr.HrBSHM.BSHMSecondYear.HM202',
                '203' => 'hr.HrBSHM.BSHMSecondYear.HM203',
                '301' => 'hr.HrBSHM.BSHMThirdYear.HM301',
                '302' => 'hr.HrBSHM.BSHMThirdYear.HM302',
                '303' => 'hr.HrBSHM.BSHMThirdYear.HM303',
                '401' => 'hr.HrBSHM.BSHMFourthYear.HM401',
                '402' => 'hr.HrBSHM.BSHMFourthYear.HM402',
                '403' => 'hr.HrBSHM.BSHMFourthYear.HM403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtBshm.CtBSHMFirstYear.ConsultationBshm101',
                '102' => 'AdminCtation.CtBshm.CtBSHMFirstYear.ConsultationBshm102',
                '103' => 'AdminCtation.CtBshm.CtBSHMFirstYear.ConsultationBshm103',
                '201' => 'AdminCtation.CtBshm.CtBSHMSecondYear.ConsultationBshm201',
                '202' => 'AdminCtation.CtBshm.CtBSHMSecondYear.ConsultationBshm202',
                '203' => 'AdminCtation.CtBshm.CtBSHMSecondYear.ConsultationBshm203',
                '301' => 'AdminCtation.CtBshm.CtBSHMThirdYear.ConsultationBshm301',
                '302' => 'AdminCtation.CtBshm.CtBSHMThirdYear.ConsultationBshm302',
                '303' => 'AdminCtation.CtBshm.CtBSHMThirdYear.ConsultationBshm303',
                '401' => 'AdminCtation.CtBshm.CtBSHMFourthYear.ConsultationBshm401',
                '402' => 'AdminCtation.CtBshm.CtBSHMFourthYear.ConsultationBshm402',
                '403' => 'AdminCtation.CtBshm.CtBSHMFourthYear.ConsultationBshm403',
            ],
        ];

        // Dynamically set the section based on the route name if not provided
        if ($section === null) {
            $section = str_replace('BSHM', '', request()->route()->getName());
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

    // Show a single student profile based on user role
    public function show($id)
    {
        // Fetch the student by StudentId
        $student = Student::where('StudentId', $id)->first();

        // Check if a student was found
        if (!$student) {
            return redirect()->route('BSHM101') // Use the route name for the student list
                ->with('error', 'Student not found.');
        }

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Load different views based on the role
        if ($userRole === 'Hradmin') {
            return view('hr.HrBSHM.HrProfile', compact('student'));
        } elseif ($userRole === 'Ctadmin') {
            return view('AdminCtation.CtProfile', compact('student'));
        } else {
            abort(404, "Profile view not found for role: $userRole");
        }
    }
}
