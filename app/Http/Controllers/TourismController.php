<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    public function listStudentsBySection($course_strand, $section)
    {
        // Fetch students based on course strand and section
        $students = Student::where('Course_Strand', $course_strand)
                           ->where('Grade_Level_Section', $section)
                           ->get();

        // Determine the view to load based on section
        $viewName = match ($section) {
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
            default => 'hr.HrTourism.OtherSections',
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
            return redirect()->route('student.listBySection', ['course_strand' => 'Tourism', 'section' => '101'])
                ->with('error', 'Student not found.');
        }

        // If student is found, load the profile view
        return view('hr.HrTourism.HrProfile', compact('student'));
    }

    // Show 101 students
    public function showTourism101()
    {
        $students = Student::where('Grade_Level_Section', '101')->get();
        return view('hr.HrTourism.TourismFirstYear.Tourism101', compact('students'));
    }

    // Show 102 students
    public function showTourism102()
    {
        $students = Student::where('Grade_Level_Section', '102')->get();
        return view('hr.HrTourism.TourismFirstYear.Tourism102', compact('students'));
    }

    // Show 103 students
    public function showTourism103()
    {
        $students = Student::where('Grade_Level_Section', '103')->get();
        return view('hr.HrTourism.TourismFirstYear.Tourism103', compact('students'));
    }

    // Show 201 students
    public function showTourism201()
    {
        $students = Student::where('Grade_Level_Section', '201')->get();
        return view('hr.HrTourism.TourismSecondYear.Tourism201', compact('students'));
    }

    // Show 202 students
    public function showTourism202()
    {
        $students = Student::where('Grade_Level_Section', '202')->get();
        return view('hr.HrTourism.TourismSecondYear.Tourism202', compact('students'));
    }

    // Show 203 students
    public function showTourism203()
    {
        $students = Student::where('Grade_Level_Section', '203')->get();
        return view('hr.HrTourism.TourismSecondYear.Tourism203', compact('students'));
    }

    // Show 301 students
    public function showTourism301()
    {
        $students = Student::where('Grade_Level_Section', '301')->get();
        return view('hr.HrTourism.TourismThirdYear.Tourism301', compact('students'));
    }

    // Show 302 students
    public function showTourism302()
    {
        $students = Student::where('Grade_Level_Section', '302')->get();
        return view('hr.HrTourism.TourismThirdYear.Tourism302', compact('students'));
    }

    // Show 303 students
    public function showTourism303()
    {
        $students = Student::where('Grade_Level_Section', '303')->get();
        return view('hr.HrTourism.TourismThirdYear.Tourism303', compact('students'));
    }

    // Show 401 students
    public function showTourism401()
    {
        $students = Student::where('Grade_Level_Section', '401')->get();
        return view('hr.HrTourism.TourismFourthYear.Tourism401', compact('students'));
    }

    // Show 402 students
    public function showTourism402()
    {
        $students = Student::where('Grade_Level_Section', '402')->get();
        return view('hr.HrTourism.TourismFourthYear.Tourism402', compact('students'));
    }

    // Show 403 students
    public function showTourism403()
    {
        $students = Student::where('Grade_Level_Section', '403')->get();
        return view('hr.HrTourism.TourismFourthYear.Tourism403', compact('students'));
    }
}
