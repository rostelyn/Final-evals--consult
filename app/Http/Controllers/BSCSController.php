<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BSCSController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
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
            default => 'hr.HrBSCS.OtherSections',
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
            return redirect()->route('student.listBySection', ['course_strand' => 'BSCS', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrBSCS.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showBSCS101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrBSCS.BSCSFirstYear.CS101', compact('students'));
    }

    // Show 102 students
    public function showBSCS102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrBSCS.BSCSFirstYear.CS102', compact('students'));
    }

    // Show 103 students
    public function showBSCS103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrBSCS.BSCSFirstYear.CS103', compact('students'));
    }

    // Show 201 students
    public function showBSCS201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrBSCS.BSCSSecondYear.CS201', compact('students'));
    }

    // Show 202 students
    public function showBSCS202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrBSCS.BSCSSecondYear.CS202', compact('students'));
    }

    // Show 203 students
    public function showBSCS203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrBSCS.BSCSSecondYear.CS203', compact('students'));
    }

    // Show 301 students
    public function showBSCS301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrBSCS.BSCSThirdYear.CS301', compact('students'));
    }

    // Show 302 students
    public function showBSCS302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrBSCS.BSCSThirdYear.CS302', compact('students'));
    }

    // Show 303 students
    public function showBSCS303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrBSCS.BSCSThirdYear.CS303', compact('students'));
    }

    // Show 401 students
    public function showBSCS401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrBSCS.BSCSFourthYear.CS401', compact('students'));
    }

    // Show 402 students
    public function showBSCS402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrBSCS.BSCSFourthYear.CS402', compact('students'));
    }

    // Show 403 students
    public function showBSCS403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrBSCS.BSCSFourthYear.CS403', compact('students'));
    }
}
