<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email',
            'course' => 'required',
            'grade' => 'required',
            'password' => 'required|confirmed',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads'), $fileName);
        }

        // Optional: Insert data into a database (example below)
        // Student::create([
        //     'student_id' => $request->student_id,
        //     'name' => $request->name,
        //     'age' => $request->age,
        //     'email' => $request->email,
        //     'course' => $request->course,
        //     'grade' => $request->grade,
        //     'password' => bcrypt($request->password),
        //     'picture' => $fileName,
        // ]);

        return redirect()->back()->with('success', 'Registration successful!');
    }
}

