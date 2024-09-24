<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('students')->insert([
                'StudentId' => '2024A' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => $faker->name,
                'age' => $faker->numberBetween(18, 25),
                'Outlook_Email' => $faker->unique()->safeEmail,
                'Course_Strand' => $faker->randomElement(['Science and Technology', 'Business Management', 'Arts and Design', 'Humanities']),
                'Grade_Level_Section' => 'Grade 12 - Section ' . $faker->randomLetter,
                'password' => Hash::make('password' . $i),
            ]);
        }
    }
}
