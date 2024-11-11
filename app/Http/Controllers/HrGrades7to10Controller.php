<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HrGrades7To10Controller extends Controller
{
    public function listStudentsBySection()
    {
        // Retrieve the grade dynamically from the route name (e.g., 'Grade7', 'Grade8')
        $grade = request()->route()->getName(); // This gives us 'Grade7', 'Grade8', etc.

        // Check the user role
        $userRole = auth()->user()->role;

        // Define views based on role and grade
        $views = [
            'Hradmin' => [
                'Grade7' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade7',
                'Grade8' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade8',
                'Grade9' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade9',
                'Grade10' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade10',
            ],
            'Ctadmin' => [
                'Grade7' => 'AdminCtation.SH.CtGrade7',
                'Grade8' => 'AdminCtation.SH.CtGrade8',
                'Grade9' => 'AdminCtation.SH.CtGrade9',
                'Grade10' => 'AdminCtation.SH.CtGrade10',
            ],
        ];

        // Retrieve the appropriate view for the user role and grade
        $view = $views[$userRole][$grade] ?? null;

        if (!$view || !view()->exists($view)) {
            abort(404, "View not found for grade: $grade and role: $userRole");
        }

        // Fetch students from the database based on the grade (e.g., 'Grade7')
        $students = Student::where('Grade_Level_Section', $grade)->get();

        // If no students found, you can show a message
        if ($students->isEmpty()) {
            return view($view)->with('message', 'No students found for this grade.');
        }

        return view($view, compact('students'));
    }

    public function show($studentId)
    {
        // Fetch the student by StudentId
        $student = Student::where('StudentId', $studentId)->first();

        if (!$student) {
            return redirect()->route('Grade7') // Redirect to the Grade 7 list if not found
                ->with('error', 'Student not found.');
        }

        // Get the current user's role
        $userRole = auth()->user()->role;

        // Load different views based on the role
        if ($userRole === 'Hradmin') {
            return view('hr.HRHighSchool.HsProfile', compact('student'));
        } elseif ($userRole === 'Ctadmin') {
            return view('AdminCtation.SH.HsCtProfile', compact('student'));
        } else {
            abort(404, "Profile view not found for role: $userRole");
        }
    }
}
