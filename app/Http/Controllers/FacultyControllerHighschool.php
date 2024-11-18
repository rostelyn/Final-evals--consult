<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyControllerHighschool extends Controller
{
    public function index()
    {
        $departmenthighschools = ['Facultyhighschool1', 'Facultyhighschool2', 'Facultyhighschool3'];
        
        // Map department names to image paths
        $departmentImages = [
            'Facultyhighschool1' => asset('css/CoursePicture/CS.jfif'),
            'Facultyhighschool2' => asset('css/CoursePicture/CS.jfif'),
            'Facultyhighschool3' => asset('css/CoursePicture/CS.jfif'),
        ];
        
        return view('student.evaluation.facultyhighschool.index', compact('departmenthighschools', 'departmentImages'));
    }


    public function show($departmenthighschool)
    {
     
        $facultyhighschoolDetails = [
            'Facultyhighschool1' => [
                'head' => 'Dr. Green',
                'members' => [
                    'Prof. Taylor',
                    'Prof. Evans',
                    'Prof. White',
                    'Prof. Harris'
                ]
            ],
            'Facultyhighschool2' => [
                'head' => 'Dr. Walker',
                'members' => [
                    'Prof. Clark',
                    'Prof. Lewis',
                    'Prof. Martinez',
                    'Prof. Thompson'
                ]
            ],
            'Facultyhighschool3' => [
                'head' => 'Dr. Roberts',
                'members' => [
                    'Prof. Parker',
                    'Prof. Cooper',
                    'Prof. Flores',
                    'Prof. Rivera'
                ]
            ],
        ];
        

        if (!array_key_exists($departmenthighschool, $facultyhighschoolDetails)) {
            abort(404);
        }

        return view('student.evaluation.facultyhighschool.show', [
            'departmenthighschool' => $departmenthighschool,
            'highschooldetails' => $facultyhighschoolDetails[$departmenthighschool]
        ]);
    }
}
