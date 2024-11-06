<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HRSController extends Controller
{
    public function listStudentsBySection()
    {
        // Extract the section from the route name, e.g., 'HRS101' -> '101'
        $section = str_replace('HRS', '', request()->route()->getName());

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrHRS.HRSFirstYear.HRS101',
                '102' => 'hr.HrHRS.HRSFirstYear.HRS102',
                '103' => 'hr.HrHRS.HRSFirstYear.HRS103',
                '201' => 'hr.HrHRS.HRSSecondYear.HRS201',
                '202' => 'hr.HrHRS.HRSSecondYear.HRS202',
                '203' => 'hr.HrHRS.HRSSecondYear.HRS203',
                '301' => 'hr.HrHRS.HRSThirdYear.HRS301',
                '302' => 'hr.HrHRS.HRSThirdYear.HRS302',
                '303' => 'hr.HrHRS.HRSThirdYear.HRS303',
                '401' => 'hr.HrHRS.HRSFourthYear.HRS401',
                '402' => 'hr.HrHRS.HRSFourthYear.HRS402',
                '403' => 'hr.HrHRS.HRSFourthYear.HRS403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtHrs.CtHRSFirstYear.ConsultationHrs101',
                '102' => 'AdminCtation.CtHrs.CtHRSFirstYear.ConsultationHrs102',
                '103' => 'AdminCtation.CtHrs.CtHRSFirstYear.ConsultationHrs103',
                '201' => 'AdminCtation.CtHrs.CtHRSSecondYear.ConsultationHrs201',
                '202' => 'AdminCtation.CtHrs.CtHRSSecondYear.ConsultationHrs202',
                '203' => 'AdminCtation.CtHrs.CtHRSSecondYear.ConsultationHrs203',
                '301' => 'AdminCtation.CtHrs.CtHRSThirdYear.ConsultationHrs301',
                '302' => 'AdminCtation.CtHrs.CtHRSThirdYear.ConsultationHrs302',
                '303' => 'AdminCtation.CtHrs.CtHRSThirdYear.ConsultationHrs303',
                '401' => 'AdminCtation.CtHrs.CtHRSFourthYear.ConsultationHrs401',
                '402' => 'AdminCtation.CtHrs.CtHRSFourthYear.ConsultationHrs402',
                '403' => 'AdminCtation.CtHrs.CtHRSFourthYear.ConsultationHrs403',
            ],
        ];

        // Get the correct view path based on role and section
        $view = $views[$userRole][$section] ?? null;

        // If view doesn't exist, return a 404 error
        if (!$view || !view()->exists($view)) {
            abort(404, "View not found for section: $section and role: $userRole");
        }

        // Fetch students based on course strand ('HRS') and section
        $students = Student::where('Course_Strand', 'HRS')
                           ->where('Grade_Level_Section', $section)
                           ->get();

        return view($view, compact('students'));
    }

    public function show($id)
    {
        // Fetch the student by StudentId
        $student = Student::where('StudentId', $id)->first();

        // Check if a student was found
        if (!$student) {
            return redirect()->route('HRS101') // Redirect to a default section if not found
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
