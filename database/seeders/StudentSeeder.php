<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('students')->insert([
                'StudentId' => '2024A' . str_pad($i, 3, '0', STR_PAD_LEFT), // Unique Student ID
                'name' => $faker->name, // Random name
                'age' => $faker->numberBetween(18, 25), // Random age between 18 and 25
                'Outlook_Email' => $faker->unique()->safeEmail, // Random unique email
                'Course_Strand' => $faker->randomElement([
                    'Science and Technology', 'Business Management', 'Arts and Design', 'Humanities'
                ]), // Random course/strand
                'Grade_Level_Section' => 'Grade 12 - Section ' . $faker->randomLetter, // Random section
                'password' => Hash::make('password' . $i), // Hashed password
                'picture' => $faker->imageUrl(), // Random picture URL (optional)
            ]);
        }
    }
}
