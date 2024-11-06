<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    public function listStudentsBySection()
    {
        // Extract the section from the route name, e.g., 'Tourism101' -> '101'
        $section = str_replace('Tourism', '', request()->route()->getName());

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrTourism.TourismFirstYear.Tourism101',
                '102' => 'hr.HrTourism.TourismFirstYear.Tourism102',
                '103' => 'hr.HrTourism.TourismFirstYear.Tourism103',
                '201' => 'hr.HrTourism.TourismSecondYear.Tourism201',
                '202' => 'hr.HrTourism.TourismSecondYear.Tourism202',
                '203' => 'hr.HrTourism.TourismSecondYear.Tourism203',
                '301' => 'hr.HrTourism.TourismThirdYear.Tourism301',
                '302' => 'hr.HrTourism.TourismThirdYear.Tourism302',
                '303' => 'hr.HrTourism.TourismThirdYear.Tourism303',
                '401' => 'hr.HrTourism.TourismFourthYear.Tourism401',
                '402' => 'hr.HrTourism.TourismFourthYear.Tourism402',
                '403' => 'hr.HrTourism.TourismFourthYear.Tourism403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtTourism.CtTourismFirstYear.ConsultationTourism101',
                '102' => 'AdminCtation.CtTourism.CtTourismFirstYear.ConsultationTourism102',
                '103' => 'AdminCtation.CtTourism.CtTourismFirstYear.ConsultationTourism103',
                '201' => 'AdminCtation.CtTourism.CtTourismSecondYear.ConsultationTourism201',
                '202' => 'AdminCtation.CtTourism.CtTourismSecondYear.ConsultationTourism202',
                '203' => 'AdminCtation.CtTourism.CtTourismSecondYear.ConsultationTourism203',
                '301' => 'AdminCtation.CtTourism.CtTourismThirdYear.ConsultationTourism301',
                '302' => 'AdminCtation.CtTourism.CtTourismThirdYear.ConsultationTourism302',
                '303' => 'AdminCtation.CtTourism.CtTourismThirdYear.ConsultationTourism303',
                '401' => 'AdminCtation.CtTourism.CtTourismFourthYear.ConsultationTourism401',
                '402' => 'AdminCtation.CtTourism.CtTourismFourthYear.ConsultationTourism402',
                '403' => 'AdminCtation.CtTourism.CtTourismFourthYear.ConsultationTourism403',
            ],
        ];

        // Get the correct view path based on role and section
        $view = $views[$userRole][$section] ?? null;

        // If view doesn't exist, return a 404 error
        if (!$view || !view()->exists($view)) {
            abort(404, "View not found for section: $section and role: $userRole");
        }

        // Fetch students based on course strand ('Tourism') and section
        $students = Student::where('Course_Strand', 'Tourism')
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
            return redirect()->route('Tourism101') // Redirect to a default section if not found
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
