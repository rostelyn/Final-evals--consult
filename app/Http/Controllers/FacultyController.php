<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $departments = ['Computer Department', 'HM Department', 'Tesda Department', 'ComScie Department'];
    
        // Map department names to image paths
        $departmentImages = [
            'Computer Department' => asset('css/CoursePicture/CS.jfif'),
            'HM Department' => asset('css/CoursePicture/Hm.jfif'),
            'Tesda Department' => asset('css/CoursePicture/Tesda.png'),
            'ComScie Department' => asset('css/CoursePicture/COMSCI.jpg'),
        ];
    
        return view('student.evaluation.faculty.index', compact('departments', 'departmentImages'));
    }
    

    public function show($department)
    {
 
        $facultyDetails = [
            'Computer Department' => [
                'head' => [
                    'name' => 'Jhai De Guzman',
                    'image' => asset('css/CoursePicture/CS.jfif'),
                ],
                'members' => [
                    [
                        'name' => 'Percian Joseph Borja',
                        'image' => asset('css/FacultyPictures/Percian.jpg'),
                    ],
                    [
                        'name' => 'Eric Almoguerra',
                        'image' => asset('css/FacultyPictures/Eric.jpg'),
                    ],
                    [
                        'name' => 'Aries Cayabyab',
                        'image' => asset('css/FacultyPictures/Aries.jpg'),
                    ],
                    [
                        'name' => 'Nomer Aleviado',
                        'image' => asset('css/FacultyPictures/Nomer.jpg'),
                    ],
                ],
            ],
            'HM Department' => [
                'head' => [
                    'name' => 'Dr. Smith',
                    'image' => asset('css/CoursePicture/Tesda.png'),
                ],
                'members' => [
                    [
                        'name' => 'Prof. John',
                        'image' => asset('css/FacultyPictures/John.jpg'),
                    ],
                    [
                        'name' => 'Prof. Jane',
                        'image' => asset('css/FacultyPictures/Jane.jpg'),
                    ],
                    [
                        'name' => 'Prof. Joe',
                        'image' => asset('css/FacultyPictures/Joe.jpg'),
                    ],
                    [
                        'name' => 'Prof. Jenny',
                        'image' => asset('css/FacultyPictures/Jenny.jpg'),
                    ],
                ],
            ],
           'Tesda Department' => [
                'head' => [
                    'name' => 'Dr. Smith',
                    'image' => asset('css/CoursePicture/Hm.jfif'),
                ],
                'members' => [
                    [
                        'name' => 'Prof. John',
                        'image' => asset('css/FacultyPictures/John.jpg'),
                    ],
                    [
                        'name' => 'Prof. Jane',
                        'image' => asset('css/FacultyPictures/Jane.jpg'),
                    ],
                    [
                        'name' => 'Prof. Joe',
                        'image' => asset('css/FacultyPictures/Joe.jpg'),
                    ],
                    [
                        'name' => 'Prof. Jenny',
                        'image' => asset('css/FacultyPictures/Jenny.jpg'),
                    ],
                ],
            ],
            'ComScie Department' => [
                'head' => [
                    'name' => 'Dr. Brown',
                    'image' => asset('css/CoursePicture/COMSCI.jpg'),
                ],
                'members' => [
                    [
                        'name' => 'Prof. Brian',
                        'image' => asset('css/FacultyPictures/Brian.jpg'),
                    ],
                    [
                        'name' => 'Prof. Beth',
                        'image' => asset('css/FacultyPictures/Beth.jpg'),
                    ],
                    [
                        'name' => 'Prof. Blake',
                        'image' => asset('css/FacultyPictures/Blake.jpg'),
                    ],
                    [
                        'name' => 'Prof. Bella',
                        'image' => asset('css/FacultyPictures/Bella.jpg'),
                    ],
                ],
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

