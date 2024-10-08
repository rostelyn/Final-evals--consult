<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HRBSITController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
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
            default => 'hr.HrCollegeBSIT.OtherSections',
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
            return redirect()->route('student.listBySection', ['course_strand' => 'BSIT', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrCollegeBSIT.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showBSIT101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrCollegeBSIT.BSITFirstYear.HrBSIT101', compact('students'));
    }

    // Show 102 students
    public function showBSIT102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrCollegeBSIT.BSITFirstYear.HrBSIT102', compact('students'));
    }

    // Show 103 students
    public function showBSIT103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrCollegeBSIT.BSITFirstYear.HrBSIT103', compact('students'));
    }

    // Show 201 students
    public function showBSIT201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrCollegeBSIT.BSITSecondYear.HrBSIT201', compact('students'));
    }

    // Show 202 students
    public function showBSIT202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrCollegeBSIT.BSITSecondYear.HrBSIT202', compact('students'));
    }

    // Show 203 students
    public function showBSIT203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrCollegeBSIT.BSITSecondYear.HrBSIT203', compact('students'));
    }

    // Show 301 students
    public function showBSIT301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrCollegeBSIT.BSITThirdYear.HrBSIT301', compact('students'));
    }

    // Show 302 students
    public function showBSIT302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrCollegeBSIT.BSITThirdYear.HrBSIT302', compact('students'));
    }

    // Show 303 students
    public function showBSIT303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrCollegeBSIT.BSITThirdYear.HrBSIT303', compact('students'));
    }

    // Show 401 students
    public function showBSIT401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrCollegeBSIT.BSITFourthYear.HrBSIT401', compact('students'));
    }

    // Show 402 students
    public function showBSIT402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrCollegeBSIT.BSITFourthYear.HrBSIT402', compact('students'));
    }

    // Show 403 students
    public function showBSIT403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrCollegeBSIT.BSITFourthYear.HrBSIT403', compact('students'));
    }
}
