<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class CETController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
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
            default => 'hr.HrCET.OtherSections',
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
            return redirect()->route('student.listBySection', ['course_strand' => 'CET', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrCET.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showCET101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrCET.CETFirstYear.CET101', compact('students'));
    }

    // Show 102 students
    public function showCET102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrCET.CETFirstYear.CET102', compact('students'));
    }

    // Show 103 students
    public function showCET103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrCET.CETFirstYear.CET103', compact('students'));
    }

    // Show 201 students
    public function showCET201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrCET.CETSecondYear.CET201', compact('students'));
    }

    // Show 202 students
    public function showCET202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrCET.CETSecondYear.CET202', compact('students'));
    }

    // Show 203 students
    public function showCET203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrCET.CETSecondYear.CET203', compact('students'));
    }

    // Show 301 students
    public function showCET301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrCET.CETThirdYear.CET301', compact('students'));
    }

    // Show 302 students
    public function showCET302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrCET.CETThirdYear.CET302', compact('students'));
    }

    // Show 303 students
    public function showCET303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrCET.CETThirdYear.CET303', compact('students'));
    }

    // Show 401 students
    public function showCET401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrCET.CETFourthYear.CET401', compact('students'));
    }

    // Show 402 students
    public function showCET402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrCET.CETFourthYear.CET402', compact('students'));
    }

    // Show 403 students
    public function showCET403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrCET.CETFourthYear.CET403', compact('students'));
    }
}
