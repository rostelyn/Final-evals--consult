<?php 

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HrGrade11and12Controller extends Controller
{
    public function listStudentsBySection()
    {
        // Extract the route name (e.g., 'Grade11Lovelace' or 'Grade12Aristotle')
        $routeName = request()->route()->getName();

        // Dynamically set grade and section based on the route name
        preg_match('/(Grade\d+)([A-Za-z]+)/', $routeName, $matches);

        if (count($matches) < 3) {
            abort(404, "Invalid route format");
        }

        $gradeLevel = $matches[1]; // Example: 'Grade11' or 'Grade12'
        $section = $matches[2];    // Example: 'Lovelace', 'Aristotle', etc.

        // Get the user's role
        $userRole = auth()->user()->role;

        // Define views for each role, grade level, and section
        $views = [
            'Hradmin' => [
                'Grade11' => [
                    'Lovelace' => 'hr.HRHighSchool.VIEWSTUDENT.Grade11.Lovelace',
                    'Duflo' => 'hr.HRHighSchool.VIEWSTUDENT.Grade11.Duflo',
                    'StClare' => 'hr.HRHighSchool.VIEWSTUDENT.Grade11.StClare',
                    'EsCoZier' => 'hr.HRHighSchool.VIEWSTUDENT.Grade11.EsCoZier',
                    'Aristotle' => 'hr.HRHighSchool.VIEWSTUDENT.Grade11.Aristotle',
                ],
                'Grade12' => [
                    'Torvalds' => 'hr.HRHighSchool.VIEWSTUDENT.Grade12.Torvalds',
                    'Marshall' => 'hr.HRHighSchool.VIEWSTUDENT.Grade12.Marshall',
                    'Marcus' => 'hr.HRHighSchool.VIEWSTUDENT.Grade12.Marcus',
                    'SanPedroCalungsod' => 'hr.HRHighSchool.VIEWSTUDENT.Grade12.SanPedroCalungsod',
                    'Einstein' => 'hr.HRHighSchool.VIEWSTUDENT.Grade12.Einstein',
                ],
            ],
            'Ctadmin' => [
                'Grade11' => [
                    'Lovelace' => 'AdminCtation.SH.CtGrade11.Lovelace',
                    'Duflo' => 'AdminCtation.SH.CtGrade11.Duflo',
                    'StClare' => 'AdminCtation.SH.CtGrade11.StClare',
                    'EsCoZier' => 'AdminCtation.SH.CtGrade11.EsCoZier',
                    'Aristotle' => 'AdminCtation.SH.CtGrade11.Aristotle',
                ],
                'Grade12' => [
                    'Torvalds' => 'AdminCtation.SH.CtGrade12.Torvalds',
                    'Marshall' => 'AdminCtation.SH.CtGrade12.Marshall',
                    'Marcus' => 'AdminCtation.SH.CtGrade12.Marcus',
                    'SanPedroCalungsod' => 'AdminCtation.SH.CtGrade12.SanPedroCalungsod',
                    'Einstein' => 'AdminCtation.SH.CtGrade12.Einstein',
                ],
            ],
        ];

        // Dynamically get the view based on user role, grade level, and section
        $view = $views[$userRole][$gradeLevel][$section] ?? null;

        if (!$view || !view()->exists($view)) {
            abort(404, "View not found for grade: $gradeLevel, section: $section, and role: $userRole");
        }

        // Fetch students based on grade level and section (use 'Grade_Level_Section' as the column)
        $students = Student::where('Grade_Level_Section', $section)  // Filter by Grade_Level_Section
                           ->get();

        // Return the appropriate view with the fetched students
        return view($view, compact('students'));
    }

    public function show($section, $studentId)
    {
        // Fetch the student by StudentId
        $student = Student::where('StudentId', $studentId)->first();

        // If no student is found, return an error or redirect
        if (!$student) {
            return redirect()->route('Grades', ['section' => 'Grade7', 'studentId' => '0001']) // Redirect to a default section if not found
                ->with('error', 'Student not found.');
        }

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Load different views based on role, grade, and section
        if ($userRole === 'Hradmin') {
            return view('hr.HRHighSchool.HsProfile', compact('student', 'section'));
        } elseif ($userRole === 'Ctadmin') {
            return view('AdminCtation.SH.HsCtProfile', compact('student', 'section'));
        }

        // Handle cases where no matching role is found
        abort(404, "Profile view not found for role: $userRole");
    }
}
