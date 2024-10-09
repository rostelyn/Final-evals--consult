<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HRSController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
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
            default => 'hr.HrHRS.OtherSections',
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
            return redirect()->route('student.listBySection', ['course_strand' => 'HRS', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrHRS.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showHRS101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrHRS.HRSFirstYear.HRS101', compact('students'));
    }

    // Show 102 students
    public function showHRS102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrHRS.HRSFirstYear.HRS102', compact('students'));
    }

    // Show 103 students
    public function showHRS103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrHRS.HRSFirstYear.HRS103', compact('students'));
    }

    // Show 201 students
    public function showHRS201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrHRS.HRSSecondYear.HRS201', compact('students'));
    }

    // Show 202 students
    public function showHRS202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrHRS.HRSSecondYear.HRS202', compact('students'));
    }

    // Show 203 students
    public function showHRS203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrHRS.HRSSecondYear.HRS203', compact('students'));
    }

    // Show 301 students
    public function showHRS301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrHRS.HRSThirdYear.HRS301', compact('students'));
    }

    // Show 302 students
    public function showHRS302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrHRS.HRSThirdYear.HRS302', compact('students'));
    }

    // Show 303 students
    public function showHRS303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrHRS.HRSThirdYear.HRS303', compact('students'));
    }

    // Show 401 students
    public function showHRS401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrHRS.HRSFourthYear.HRS401', compact('students'));
    }

    // Show 402 students
    public function showHRS402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrHRS.HRSFourthYear.HRS402', compact('students'));
    }

    // Show 403 students
    public function showHRS403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrHRS.HRSFourthYear.HRS403', compact('students'));
    }
}
