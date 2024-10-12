<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HrGrades7To10Controller extends Controller
{
    public function listStudentsBySection($grade)
    {
        // Fetch students based on grade level and section (since each grade has only one section)
        $students = Student::where('Grade_Level_Section', $grade)->get();

        // Determine the view to load based on grade
        $viewName = match ($grade) {
            'Grade7' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade7',
            'Grade8' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade8',
            'Grade9' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade9',
            'Grade10' => 'hr.HRHighSchool.VIEWSTUDENT.HrGrade10',
            default => 'hr.HRHighSchool.OtherGrades',
        };

        return view($viewName, compact('students'));
    }

    // Show a single student profile
    public function show($id)
    {
        // Fetch the student by their unique StudentId
        $student = Student::where('StudentId', $id)->first();

        // If the student is not found, redirect back with an error message
        if (!$student) {
            return redirect()->route('student.listBySection', ['grade' => 'Grade7'])
                ->with('error', 'Student not found.');
        }

        // Return the high school student profile view
        return view('hr.HRHighSchool.HsProfile', compact('student'));
    }

    // Show Grade 7 students
    public function showGrade7()
    {
        $students = Student::where('Grade_Level_Section', 'Grade7')->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.HrGrade7', compact('students'));
    }

    // Show Grade 8 students
    public function showGrade8()
    {
        $students = Student::where('Grade_Level_Section', 'Grade8')->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.HrGrade8', compact('students'));
    }

    // Show Grade 9 students
    public function showGrade9()
    {
        $students = Student::where('Grade_Level_Section', 'Grade9')->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.HrGrade9', compact('students'));
    }

    // Show Grade 10 students
    public function showGrade10()
    {
        $students = Student::where('Grade_Level_Section', 'Grade10')->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.HrGrade10', compact('students'));
    }

    
}
