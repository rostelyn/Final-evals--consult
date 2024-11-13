<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
   public function store(Request $request)
{
    // Validate the request, including 'username'
    $request->validate([
        'student_id' => 'required|string|max:255|unique:students,StudentId',
        'username' => 'required|string|max:255|unique:students,username',
        'name' => 'required|string|max:255',
        'age' => 'required|integer',
        'outlook_email' => 'required|email|unique:students,Outlook_Email',
        'level' => 'required|string',
        'course_strand' => 'required|string',
        'grade_level_section' => 'required|string',
        'gender' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle picture upload if exists
    if ($request->hasFile('picture')) {
        $path = $request->file('picture')->store('public/pictures');
        $picture = basename($path);
    } else {
        $picture = null;
    }

    // Create a new student record with 'username'
    $student = new Student([
        'StudentId' => $request->student_id,
        'username' => $request->username,
        'name' => $request->name,
        'age' => $request->age,
        'Outlook_Email' => $request->outlook_email,
        'level' => $request->level,
        'Course_Strand' => $request->course_strand,
        'Grade_Level_Section' => $request->grade_level_section,
        'gender' => $request->gender,
        'password' => Hash::make($request->password),
        'picture' => $picture,
    ]);

    $student->save();

    // Redirect after successful registration
    auth()->login($student);
    return redirect()->route('student-evaluation-consultation', ['id' => $student->StudentId])
        ->with('success', 'Student registered successfully! Welcome ' . $student->name);
}

public function dashboard($id)
{
    $student = Student::where('StudentId', $id)->firstOrFail();
    return view('student.student-evaluation-consultation', compact('student'));
}

}
