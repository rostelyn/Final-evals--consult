<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BSHMController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
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
            default => 'hr.HrBSHM.OtherSections',
        };

        return view($viewName, compact('students'));
    }

    // Show a single student profile
    public function show($id)
    {
        // Fetch the student by the StudentId
        $student = Student::where('StudentId', $id)->first();

        // Check if a student was found, otherwise show an error message
        if (!$student) {
            return redirect()->route('student.listBySection', ['course_strand' => 'BSHM', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrBSHM.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showBSHM101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrBSHM.BSHMFirstYear.HM101', compact('students'));
    }

    // Show 102 students
    public function showBSHM102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrBSHM.BSHMFirstYear.HM102', compact('students'));
    }

    // Show 103 students
    public function showBSHM103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrBSHM.BSHMFirstYear.HM103', compact('students'));
    }

    // Show 201 students
    public function showBSHM201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrBSHM.BSHMSecondYear.HM201', compact('students'));
    }

    // Show 202 students
    public function showBSHM202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrBSHM.BSHMSecondYear.HM202', compact('students'));
    }

    // Show 203 students
    public function showBSHM203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrBSHM.BSHMSecondYear.HM203', compact('students'));
    }

    // Show 301 students
    public function showBSHM301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrBSHM.BSHMThirdYear.HM301', compact('students'));
    }

    // Show 302 students
    public function showBSHM302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrBSHM.BSHMThirdYear.HM302', compact('students'));
    }

    // Show 303 students
    public function showBSHM303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrBSHM.BSHMThirdYear.HM303', compact('students'));
    }

    // Show 401 students
    public function showBSHM401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrBSHM.BSHMFourthYear.HM401', compact('students'));
    }

    // Show 402 students
    public function showBSHM402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrBSHM.BSHMFourthYear.HM402', compact('students'));
    }

    // Show 403 students
    public function showBSHM403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrBSHM.BSHMFourthYear.HM403', compact('students'));
    }
}
