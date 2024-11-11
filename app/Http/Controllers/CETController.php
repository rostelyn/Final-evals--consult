<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class CETController extends Controller
{
    public function listStudentsBySection()
    {
        // Extract the section from the route name, e.g., 'CET101' -> '101'
        $section = str_replace('CET', '', request()->route()->getName());

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrCET.CETFirstYear.CET101',
                '102' => 'hr.HrCET.CETFirstYear.CET102',
                '103' => 'hr.HrCET.CETFirstYear.CET103',
                '201' => 'hr.HrCET.CETSecondYear.CET201',
                '202' => 'hr.HrCET.CETSecondYear.CET202',
                '203' => 'hr.HrCET.CETSecondYear.CET203',
                '301' => 'hr.HrCET.CETThirdYear.CET301',
                '302' => 'hr.HrCET.CETThirdYear.CET302',
                '303' => 'hr.HrCET.CETThirdYear.CET303',
                '401' => 'hr.HrCET.CETFourthYear.CET401',
                '402' => 'hr.HrCET.CETFourthYear.CET402',
                '403' => 'hr.HrCET.CETFourthYear.CET403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtCet.CtCETFirstYear.ConsultationCet101',
                '102' => 'AdminCtation.CtCet.CtCETFirstYear.ConsultationCet102',
                '103' => 'AdminCtation.CtCet.CtCETFirstYear.ConsultationCet103',
                '201' => 'AdminCtation.CtCet.CtCETSecondYear.ConsultationCet201',
                '202' => 'AdminCtation.CtCet.CtCETSecondYear.ConsultationCet202',
                '203' => 'AdminCtation.CtCet.CtCETSecondYear.ConsultationCet203',
                '301' => 'AdminCtation.CtCet.CtCETThirdYear.ConsultationCet301',
                '302' => 'AdminCtation.CtCet.CtCETThirdYear.ConsultationCet302',
                '303' => 'AdminCtation.CtCet.CtCETThirdYear.ConsultationCet303',
                '401' => 'AdminCtation.CtCet.CtCETFourthYear.ConsultationCet401',
                '402' => 'AdminCtation.CtCet.CtCETFourthYear.ConsultationCet402',
                '403' => 'AdminCtation.CtCet.CtCETFourthYear.ConsultationCet403',
            ],
        ];

        // Get the correct view path based on role and section
        $view = $views[$userRole][$section] ?? null;

        // If view doesn't exist, return a 404 error
        if (!$view || !view()->exists($view)) {
            abort(404, "View not found for section: $section and role: $userRole");
        }

        // Fetch students based on course strand ('CET') and section
        $students = Student::where('Course_Strand', 'CET')
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
            return redirect()->route('CET101') // Redirect to a default section if not found
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
