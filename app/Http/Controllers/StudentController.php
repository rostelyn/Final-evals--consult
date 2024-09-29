<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function show($studentId)
    {
        $student = Student::find($studentId);

        if (!$student) {
            abort(404, 'Student not found');
        }

        // Remove dd($student) for production use
        // dd($student);

        $teachers = [];
        return view('HrProfile', compact('student', 'teachers'));
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students,student_id',
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'outlook_email' => 'required|email|unique:students,outlook_email',
            'course_strand' => 'required|string',
            'grade_level_section' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $student = new Student([
            'student_id' => $request->get('student_id'),
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'outlook_email' => $request->get('outlook_email'),
            'course_strand' => $request->get('course_strand'),
            'grade_level_section' => $request->get('grade_level_section'),
            'password' => Hash::make($request->get('password')), // Password hashing
        ]);

        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $imageName);
            $student->picture = $imageName;
        }

        $student->save();

        return redirect()->route('students.create')->with('success', 'Student registered successfully!');
    }
}
