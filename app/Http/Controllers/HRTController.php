<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HRTController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
            '101' => 'hr.HrHRT.HRTFirstYear.HRT101',
            '102' => 'hr.HrHRT.HRTFirstYear.HRT102',
            '103' => 'hr.HrHRT.HRTFirstYear.HRT103',
            '201' => 'hr.HrHRT.HRTSecondYear.HRT201',
            '202' => 'hr.HrHRT.HRTSecondYear.HRT202',
            '203' => 'hr.HrHRT.HRTSecondYear.HRT203',
            '301' => 'hr.HrHRT.HRTThirdYear.HRT301',
            '302' => 'hr.HrHRT.HRTThirdYear.HRT302',
            '303' => 'hr.HrHRT.HRTThirdYear.HRT303',
            '401' => 'hr.HrHRT.HRTFourthYear.HRT401',
            '402' => 'hr.HrHRT.HRTFourthYear.HRT402',
            '403' => 'hr.HrHRT.HRTFourthYear.HRT403',
            default => 'hr.HrHRT.OtherSections',
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
            return redirect()->route('student.listBySection', ['course_strand' => 'HRT', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrHRT.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showHRT101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrHRT.HRTFirstYear.HRT101', compact('students'));
    }

    // Show 102 students
    public function showHRT102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrHRT.HRTFirstYear.HRT102', compact('students'));
    }

    // Show 103 students
    public function showHRT103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrHRT.HRTFirstYear.HRT103', compact('students'));
    }

    // Show 201 students
    public function showHRT201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrHRT.HRTSecondYear.HRT201', compact('students'));
    }

    // Show 202 students
    public function showHRT202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrHRT.HRTSecondYear.HRT202', compact('students'));
    }

    // Show 203 students
    public function showHRT203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrHRT.HRTSecondYear.HRT203', compact('students'));
    }

    // Show 301 students
    public function showHRT301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrHRT.HRTThirdYear.HRT301', compact('students'));
    }

    // Show 302 students
    public function showHRT302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrHRT.HRTThirdYear.HRT302', compact('students'));
    }

    // Show 303 students
    public function showHRT303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrHRT.HRTThirdYear.HRT303', compact('students'));
    }

    // Show 401 students
    public function showHRT401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrHRT.HRTFourthYear.HRT401', compact('students'));
    }

    // Show 402 students
    public function showHRT402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrHRT.HRTFourthYear.HRT402', compact('students'));
    }

    // Show 403 students
    public function showHRT403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrHRT.HRTFourthYear.HRT403', compact('students'));
    }
}
