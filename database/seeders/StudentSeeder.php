<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Clear the table before seeding
        DB::table('students')->truncate();

        $courses = ['BSIT', 'BSCS', 'BSHM', 'CET', 'ACT', 'HRT', 'HRS', 'TOURISM'];
        $sections = ['101', '102', '103', '201', '202', '203', '301', '302', '303', '401', '402', '403'];

        $studentCounter = 1; // Start counter for student IDs

        foreach ($courses as $course) {
            foreach ($sections as $section) {

                // Ensure the StudentId is unique
                $studentId = $this->generateStudentId($studentCounter);
                
                DB::table('students')->insert([
                    'StudentId' => $studentId, // Generate formatted StudentId
                    'name' => $this->generateRandomName(),
                    'age' => rand(18, 25),
                    'Outlook_Email' => Str::random(10) . '@outlook.com',
                    'Course_Strand' => $course,
                    'Grade_Level_Section' => $section,
                    'gender' => $this->randomGender(),
                    'password' => bcrypt('password'), // Default password
                    'picture' => null, // Optionally add image paths
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Insert 10 students per section
                for ($i = 0; $i < 10; $i++) {
                    DB::table('students')->insert([
                        'StudentId' => $this->generateStudentId($studentCounter), // Generate formatted StudentId
                        'name' => $this->generateRandomName(),
                        'age' => rand(18, 25),
                        'Outlook_Email' => Str::random(10) . '@outlook.com',
                        'Course_Strand' => $course,
                        'Grade_Level_Section' => $section,
                        'gender' => $this->randomGender(),
                        'password' => bcrypt('password'), // Default password
                        'picture' => null, // Optionally add image paths
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);


                    $studentCounter++; // Increment student counter after each insert
                }
            }
        }
    }

    // Method to generate a StudentId in the format '21-0000'
    private function generateStudentId($counter)
    {
        return '21-' . str_pad($counter, 4, '0', STR_PAD_LEFT); // Format: 21-0000
    }

    private function generateRandomName()
    {
        $firstNames = ['John', 'Jane', 'Alex', 'Chris', 'Taylor', 'Morgan'];
        $lastNames = ['Smith', 'Doe', 'Johnson', 'Brown', 'Davis', 'Miller'];

        return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
    }

    private function randomGender()
    {
        return rand(0, 1) == 1 ? 'Male' : 'Female';
    }
}
