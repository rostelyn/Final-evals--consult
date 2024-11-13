<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Clear the table before seeding
        DB::table('students')->truncate();

        $faker = Faker::create();
        $courses = ['BSIT', 'BSCS', 'BSHM', 'CET', 'ACT', 'HRT', 'HRS', 'TOURISM'];
        $sections = ['101', '102', '103', '201', '202', '203', '301', '302', '303', '401', '402', '403'];

        $studentCounter = 1; // Start counter for student IDs

        foreach ($courses as $course) {
            foreach ($sections as $section) {

                // Insert 10 students per section
                for ($i = 0; $i < 10; $i++) {
                    $studentId = $this->generateStudentId($studentCounter); // Generate formatted StudentId

                    DB::table('students')->insert([
                        'StudentId' => $studentId,
                        'name' => $faker->name,
                        'age' => $faker->numberBetween(18, 25),
                        'Outlook_Email' => $faker->unique()->safeEmail,
                        'Course_Strand' => $course,
                        'Grade_Level_Section' => $section,
                        'gender' => $this->randomGender(),
                        'password' => Hash::make('password'), // Default password
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

    private function randomGender()
    {
        return rand(0, 1) == 1 ? 'Male' : 'Female';
    }
}
