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
                'Engineering Department' => asset('css/GeneralResources/logoo.jpg'),
            ];
            return view('student.evaluation.faculty.index', compact('departments', 'departmentImages', 'grade_level_section'));
        } 
        // High school department details
        elseif ($grade_level_section === 'highschool') {
            $departments = ['Highschool Department'];
            $departmentImages = [
                'Highschool Department' => asset('css/GeneralResources/hslogo.jpg'),
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
                        ['name' => 'Percian Joseph Borja', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Eric Almoguerra', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Aries Cayabyab', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Nomer Aleviado', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Joseph Chua', 'image' => asset('css/evaluatepicture/icon.jpg')],
                    ],
                ],
                'HM Department' => [
                    'head' => [
                        'name' => 'Jessalyn Sarmiento Tancio',
                        'image' => asset('css/CoursePicture/Hm.jfif'),
                    ],
                    'members' => [
                        ['name' => 'Katherine Araos', 'image' =>  asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Hannie Faye Cuaresma', 'image' =>  asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Jaevend Mae Deuda', 'image' =>  asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Chrislyn Colleen Sison', 'image' =>  asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Atty. RK. Dela Fuente', 'image' =>  asset('css/evaluatepicture/icon.jpg')],
                    ],
                ],
                'Tesda Department' => [
                    'head' => [
                        'name' => 'Felix Garcia',
                        'image' => asset('css/CoursePicture/Tesda.png'),
                    ],
                    'members' => [
                        ['name' => 'Carlos Rivera', 'image' =>  asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Juan Santos', 'image' =>    asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Maria De Leon', 'image' =>  asset('css/evaluatepicture/icon.jpg')],
                    ],
                ],
                'Engineering Department' => [
                    'head' => [
                        'name' => 'Engr. Adelino Cordova Jr.',
                        'image' => asset('css/GeneralResources/logoo.jpg'),
                    ],
                    'members' => [
                        ['name' => 'Engr. Taylor', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Engr. Evans', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Engr. James', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Engr. Harris', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Engr. White', 'image' => asset('css/evaluatepicture/icon.jpg')],
                    ],
                ],
            ],
            'highschool' => [
                'Highschool Department' => [
                    'head' => [
                        'name' => 'Arlene Cabillan',
                        'image' => asset('css/GeneralResources/hslogo.jpg'),
                    ],
                    'members' => [
                        ['name' => 'Baby-Lyn Ravago', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Ronald Simbul', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Juniel Jenolan', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Dhan Ramos', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Eljer Dizon', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Angelica Garcia', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Shelby Enriquez', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Mhaicka Tolentino', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Mitzi Malixi', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Jan Antonnete Canindo', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Christine Leron', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Sean Reclosado', 'image' => asset('css/evaluatepicture/icon.jpg')],
                        ['name' => 'Saira Mangayao', 'image' => asset('css/evaluatepicture/icon.jpg')],
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
