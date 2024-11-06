<?php 

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BSCSController extends Controller
{
    public function listStudentsBySection()
    {
        // Extract the section from the route name, e.g., 'BSCS101' -> '101'
        $section = str_replace('BSCS', '', request()->route()->getName());

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Define views based on role and section
        $views = [
            'Hradmin' => [
                '101' => 'hr.HrBSCS.BSCSFirstYear.CS101',
                '102' => 'hr.HrBSCS.BSCSFirstYear.CS102',
                '103' => 'hr.HrBSCS.BSCSFirstYear.CS103',
                '201' => 'hr.HrBSCS.BSCSSecondYear.CS201',
                '202' => 'hr.HrBSCS.BSCSSecondYear.CS202',
                '203' => 'hr.HrBSCS.BSCSSecondYear.CS203',
                '301' => 'hr.HrBSCS.BSCSThirdYear.CS301',
                '302' => 'hr.HrBSCS.BSCSThirdYear.CS302',
                '303' => 'hr.HrBSCS.BSCSThirdYear.CS303',
                '401' => 'hr.HrBSCS.BSCSFourthYear.CS401',
                '402' => 'hr.HrBSCS.BSCSFourthYear.CS402',
                '403' => 'hr.HrBSCS.BSCSFourthYear.CS403',
            ],
            'Ctadmin' => [
                '101' => 'AdminCtation.CtBscs.CtBSCSFirstYear.ConsultationBSCS101',  // Updated view path
                '102' => 'AdminCtation.CtBSCS.CtBSCSFirstYear.ConsultationBSCS102',
                '103' => 'AdminCtation.CtBSCS.CtBSCSFirstYear.ConsultationBSCS103',
                '201' => 'AdminCtation.CtBSCS.CtBSCSSecondYear.ConsultationBSCS201',
                '202' => 'AdminCtation.CtBSCS.CtBSCSSecondYear.ConsultationBSCS202',
                '203' => 'AdminCtation.CtBSCS.CtBSCSSecondYear.ConsultationBSCS203',
                '301' => 'AdminCtation.CtBSCS.CtBSCSThirdYear.ConsultationBSCS301',
                '302' => 'AdminCtation.CtBSCS.CtBSCSThirdYear.ConsultationBSCS302',
                '303' => 'AdminCtation.CtBSCS.CtBSCSThirdYear.ConsultationBSCS303',
                '401' => 'AdminCtation.CtBSCS.CtBSCSFourthYear.ConsultationBSCS401',
                '402' => 'AdminCtation.CtBSCS.CtBSCSFourthYear.ConsultationBSCS402',
                '403' => 'AdminCtation.CtBSCS.CtBSCSFourthYear.ConsultationBSCS403',
            ],
        ];

        // Get the correct view path based on role and section
        $view = $views[$userRole][$section] ?? null;

        // If view doesn't exist, return a 404 error
        if (!$view || !view()->exists($view)) {
            abort(404, "View not found for section: $section and role: $userRole");
        }

        // Fetch students based on course strand ('BSCS') and section
        $students = Student::where('Course_Strand', 'BSCS')
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
            return redirect()->route('BSCS101') // Redirect to a default section if not found
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
