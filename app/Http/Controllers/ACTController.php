<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ACTController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
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
            default => 'hr.HrACT.OtherSections',
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
            return redirect()->route('student.listBySection', ['course_strand' => 'ACT', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrACT.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showACT101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrACT.ACTFirstYear.ACT101', compact('students'));
    }

    // Show 102 students
    public function showACT102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrACT.ACTFirstYear.ACT102', compact('students'));
    }

    // Show 103 students
    public function showACT103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrACT.ACTFirstYear.ACT103', compact('students'));
    }

    // Show 201 students
    public function showACT201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrACT.ACTSecondYear.ACT201', compact('students'));
    }

    // Show 202 students
    public function showACT202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrACT.ACTSecondYear.ACT202', compact('students'));
    }

    // Show 203 students
    public function showACT203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrACT.ACTSecondYear.ACT203', compact('students'));
    }

    // Show 301 students
    public function showACT301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrACT.ACTThirdYear.ACT301', compact('students'));
    }

    // Show 302 students
    public function showACT302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrACT.ACTThirdYear.ACT302', compact('students'));
    }

    // Show 303 students
    public function showACT303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrACT.ACTThirdYear.ACT303', compact('students'));
    }

    // Show 401 students
    public function showACT401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrACT.ACTFourthYear.ACT401', compact('students'));
    }

    // Show 402 students
    public function showACT402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrACT.ACTFourthYear.ACT402', compact('students'));
    }

    // Show 403 students
    public function showACT403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrACT.ACTFourthYear.ACT403', compact('students'));
    }
}
