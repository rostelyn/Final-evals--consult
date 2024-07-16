<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        // Replace this with data from your database
        $departments = ['CS', 'Faculty1', 'Faculty2', 'Faculty3'];
        
        return view('student.evaluation.faculty.index', compact('departments'));
    }

    public function show($department)
    {
        // Replace this with data from your database
        $facultyDetails = [
            'CS' => [
                'head' => 'Sir Percian',
                'members' => [
                    'Sir Eric',
                    'Sir Aries',
                    'Sir Nomer',
                    'Maam Jhai'
                ]
            ],
            'Faculty1' => [
                'head' => 'Dr. Smith',
                'members' => [
                    'Prof. John',
                    'Prof. Jane',
                    'Prof. Joe',
                    'Prof. Jenny'
                ]
            ],
            'Faculty2' => [
                'head' => 'Dr. Adams',
                'members' => [
                    'Prof. Alan',
                    'Prof. Alice',
                    'Prof. Aaron',
                    'Prof. Amanda'
                ]
            ],
            'Faculty3' => [
                'head' => 'Dr. Brown',
                'members' => [
                    'Prof. Brian',
                    'Prof. Beth',
                    'Prof. Blake',
                    'Prof. Bella'
                ]
            ],
        ];

        if (!array_key_exists($department, $facultyDetails)) {
            abort(404);
        }

        return view('student.evaluation.faculty.show', [
            'department' => $department,
            'details' => $facultyDetails[$department]
        ]);
    }
}

