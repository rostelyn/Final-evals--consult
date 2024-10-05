<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function HrBSIT101()
    {
        $students = Student::all();
        return view('hr.HrCollegeBSIT.HrBSIT101', compact('students'));
    }

    // Show the registration form
    public function create()
    {
        return view('registration');
    }

    public function store(Request $request)
    {
    $request->validate([
        'student_id' => 'required|string|max:255|unique:students,StudentId',
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'outlook_email' => 'required|email|unique:students,Outlook_Email',
        'course_strand' => 'required|string',
        'grade_level_section' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $student = new Student([
        'StudentId' => $request->student_id, 
        'name' => $request->name,
        'age' => $request->age,
        'Outlook_Email' => $request->outlook_email,
        'Course_Strand' => $request->course_strand,
        'Grade_Level_Section' => $request->grade_level_section,
        'password' => Hash::make($request->password),
    ]);

    if ($request->hasFile('picture')) {
        $imageName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('images'), $imageName);
        $student->picture = $imageName;
    }
        $student->save();

        return redirect()->route('student-evaluation-consultation', ['id' => $student->StudentId])
            ->with('success', 'Student registered successfully! Welcome ' . $student->name);
    }

    public function show($id)
    {
        $student = Student::where('StudentId', $id)->firstOrFail();
        return view('student.student-evaluation-consultation', compact('student'));
    }

    public function dashboard($id)
    {
        $student = Student::where('StudentId', $id)->firstOrFail();
        return view('student.student-evaluation-consultation', compact('student'));
    }
}
