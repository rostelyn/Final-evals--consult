<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HrGrade11and12Controller extends Controller
{
    // Show methods for Grade 11 sections
    public function showLovelace()
    {
        $students = Student::where('Course_Strand', 'Grade 11')
                           ->where('Grade_Level_Section', 'Lovelace')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade11.Lovelace', compact('students'));
    }

    public function showAristotle()
    {
        $students = Student::where('Course_Strand', 'Grade 11')
                           ->where('Grade_Level_Section', 'Aristotle')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade11.Aristotle', compact('students'));
    }

    public function showStClare()
    {
        $students = Student::where('Course_Strand', 'Grade 11')
                           ->where('Grade_Level_Section', 'StClare')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade11.StClare', compact('students'));
    }

    public function showDuflo()
    {
        $students = Student::where('Course_Strand', 'Grade 11')
                           ->where('Grade_Level_Section', 'Duflo')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade11.Duflo', compact('students'));
    }

    public function showEsCoZier()
    {
        $students = Student::where('Course_Strand', 'Grade 11')
                           ->where('Grade_Level_Section', 'EsCoZier')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade11.EsCoZier', compact('students'));
    }

    // Show methods for Grade 12 sections
   
    
    public function showTorvalds()
    {
        $students = Student::where('Course_Strand', 'Grade 11')
                           ->where('Grade_Level_Section', 'Torvalds')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade12.Torvalds', compact('students'));
    }

    public function showMarshall()
    {
        $students = Student::where('Course_Strand', 'Grade 12')
                           ->where('Grade_Level_Section', 'Marshall')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade12.Marshall', compact('students'));
    }

    public function showSanPedroCalungsod()
    {
        $students = Student::where('Course_Strand', 'Grade 12')
                           ->where('Grade_Level_Section', 'SanPedroCalungsod')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade12.SanPedroCalungsod', compact('students'));
    }

    public function showEinstein()
    {
        $students = Student::where('Course_Strand', 'Grade 12')
                           ->where('Grade_Level_Section', 'Einstein')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade12.Einstein', compact('students'));
    }

    public function showMarCus()
    {
        $students = Student::where('Course_Strand', 'Grade 12')
                           ->where('Grade_Level_Section', 'MarCus')
                           ->get();
        return view('hr.HRHighSchool.VIEWSTUDENT.Grade12.MarCus', compact('students'));
    }

    // Show individual student profile for Grades 11 and 12
    public function show($id)
    {
        // Fetch the student by StudentId
        $student = Student::where('StudentId', $id)->first();

        if (!$student) {
            return redirect()->route('student.listBySection', ['grade' => 'Grade11'])
                ->with('error', 'Student not found.');
        }

        // Render the high school profile for Grades 11 and 12 (use HsProfile view)
        return view('hr.HRHighSchool.HsProfile', compact('student'));
    }
}
