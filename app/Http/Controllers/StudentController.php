<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('registration');
    }

    // Store student and redirect to dashboard
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'student_id' => 'required|string|max:255|unique:students,StudentId',
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'outlook_email' => 'required|email|unique:students,Outlook_Email',
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

        // Create a new student record
        $student = new Student([
            'StudentId' => $request->student_id,
            'name' => $request->name,
            'age' => $request->age,
            'Outlook_Email' => $request->outlook_email,
            'Course_Strand' => $request->course_strand,
            'Grade_Level_Section' => $request->grade_level_section,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'picture' => $picture,
        ]);

        // Save the student record
        $student->save();

        // Redirect to the student dashboard after saving
        return redirect()->route('student-evaluation-consultation', ['id' => $student->StudentId])
        ->with('success', 'Student registered successfully! Welcome ' . $student->name);
    }

    // Show the student dashboard
    public function dashboard($id)
    {
        $student = Student::where('StudentId', $id)->firstOrFail();
        return view('student.student-evaluation-consultation', compact('student'));
    }

}
