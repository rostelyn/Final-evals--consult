<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index($grade_level_section)
    {
        // College department details
        if ($grade_level_section === 'college') {
            $departments = ['Computer Department', 'HM Department', 'Tesda Department', 'Engineering Department'];
            $departmentImages = [
                'Computer Department' => asset('css/CoursePicture/CS.jfif'),
                'HM Department' => asset('css/CoursePicture/Hm.jfif'),
                'Tesda Department' => asset('css/CoursePicture/Tesda.png'),
                'Engineering Department' => asset('css/CoursePicture/COMSCI.jpg'),
            ];
            return view('student.evaluation.faculty.index', compact('departments', 'departmentImages', 'grade_level_section'));
        } 
        // High school department details
        elseif ($grade_level_section === 'highschool') {
            $departments = ['Facultyhighschool1', 'Facultyhighschool2', 'Facultyhighschool3'];
            $departmentImages = [
                'Facultyhighschool1' => asset('css/CoursePicture/CS.jfif'),
                'Facultyhighschool2' => asset('css/CoursePicture/CS.jfif'),
                'Facultyhighschool3' => asset('css/CoursePicture/CS.jfif'),
            ];
            
            return view('student.evaluation.facultyhighschool.index', compact('departments', 'departmentImages', 'grade_level_section'));
        }
    
        // If no valid grade level section is provided, show a 404
        abort(404);
    }

    public function show($grade_level_section, $department)
    {
        // Get the faculty details for the selected department
        $details = $this->getFacultyDetails($grade_level_section, $department);

        // Pass details and department to the view
        return view('student.evaluation.faculty.show', compact('details', 'grade_level_section', 'department'));
    }

    /**
     * Get the faculty details based on the grade level section and department
     *
     * @param string $grade_level_section
     * @param string $department
     * @return array
     */
    public function getFacultyDetails($grade_level_section, $department)
    {
        // Define faculty details for College and High School departments
        $facultyDetails = [
            'college' => [
                'Computer Department' => [
                    'head' => [
                        'name' => 'Jhai De Guzman',
                        'image' => asset('css/CoursePicture/CS.jfif'),
                    ],
                    'members' => [
                        ['name' => 'Percian Joseph Borja', 'image' => asset('css/FacultyPictures/Percian.jpg')],
                        ['name' => 'Eric Almoguerra', 'image' => asset('css/FacultyPictures/Eric.jpg')],
                        ['name' => 'Aries Cayabyab', 'image' => asset('css/FacultyPictures/Aries.jpg')],
                        ['name' => 'Nomer Aleviado', 'image' => asset('css/FacultyPictures/Nomer.jpg')],
                    ],
                ],
                'HM Department' => [
                    'head' => [
                        'name' => 'Jessalyn Sarmiento Tancio',
                        'image' => asset('css/CoursePicture/Hm.jfif'),
                    ],
                    'members' => [
                        ['name' => 'John Cruz', 'image' => asset('css/FacultyPictures/John.jpg')],
                        ['name' => 'Ana Lopez', 'image' => asset('css/FacultyPictures/Ana.jpg')],
                        ['name' => 'Liza Mendoza', 'image' => asset('css/FacultyPictures/Liza.jpg')],
                    ],
                ],
                'Tesda Department' => [
                    'head' => [
                        'name' => 'Felix Garcia',
                        'image' => asset('css/CoursePicture/Tesda.png'),
                    ],
                    'members' => [
                        ['name' => 'Carlos Rivera', 'image' => asset('css/FacultyPictures/Carlos.jpg')],
                        ['name' => 'Juan Santos', 'image' => asset('css/FacultyPictures/Juan.jpg')],
                        ['name' => 'Maria De Leon', 'image' => asset('css/FacultyPictures/Maria.jpg')],
                    ],
                ],
                'Engineering Department' => [
                    'head' => [
                        'name' => 'Engr. Adelino Cordova Jr.',
                        'image' => asset('css/CoursePicture/COMSCI.jpg'),
                    ],
                    'members' => [
                        ['name' => 'Engr. Sarah Jane Bartolome', 'image' => asset('css/FacultyPictures/Oscar.jpg')],
                        ['name' => 'Engr. Arberlyn Rodriguez', 'image' => asset('css/FacultyPictures/Gina.jpg')],
                        ['name' => 'Engr. Christian Macalinao', 'image' => asset('css/FacultyPictures/Lloyd.jpg')],
                        ['name' => 'Engr. Saira Marie Mangayao', 'image' => asset('css/FacultyPictures/Lloyd.jpg')],
                        ['name' => 'Engr. Jenny Ventura', 'image' => asset('css/FacultyPictures/Lloyd.jpg')],
                    ],
                ],
            ],
            'highschool' => [
                'Facultyhighschool1' => [
                    'head' => [
                        'name' => 'Dr. Green',
                        'image' => asset('css/CoursePicture/CS.jfif'),
                    ],
                    'members' => [
                        ['name' => 'Prof. Taylor', 'image' => null],
                        ['name' => 'Prof. Evans', 'image' => null],
                        ['name' => 'Prof. White', 'image' => null],
                        ['name' => 'Prof. Harris', 'image' => null],
                    ],
                ],
                'Facultyhighschool2' => [
                    'head' => [
                        'name' => 'Mrs. Rachel',
                        'image' => asset('css/CoursePicture/CS.jfif'),
                    ],
                    'members' => [
                        ['name' => 'Prof. Clark', 'image' => null],
                        ['name' => 'Prof. Scott', 'image' => null],
                        ['name' => 'Prof. James', 'image' => null],
                    ],
                ],
                'Facultyhighschool3' => [
                    'head' => [
                        'name' => 'Mr. David',
                        'image' => asset('css/CoursePicture/CS.jfif'),
                    ],
                    'members' => [
                        ['name' => 'Prof. Lewis', 'image' => null],
                        ['name' => 'Prof. Miller', 'image' => null],
                        ['name' => 'Prof. Robinson', 'image' => null],
                    ],
                ],
            ],
        ];

        // Check if grade_level_section and department exist in the faculty details
        if (!array_key_exists($grade_level_section, $facultyDetails) || !array_key_exists($department, $facultyDetails[$grade_level_section])) {
            abort(404);  // Return 404 if not found
        }

        // Return the details for the selected department
        return $facultyDetails[$grade_level_section][$department];
    }
}
