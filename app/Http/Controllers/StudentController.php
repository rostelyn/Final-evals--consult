<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show($studentId)
{
    $student = Student::find($studentId);

    if (!$student) {
        abort(404, 'Student not found');
    }

    // Debugging to check if $student is correctly retrieved
    dd($student);

    $teachers = [];
    return view('HrProfile', compact('student', 'teachers'));
}
public function register(Request $request)
{
    // Validate the form data
    
}

}