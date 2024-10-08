<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $numStudents = 10;
        $prefix = '21-';
        $counter = 1;

        for ($i = 0; $i < $numStudents; $i++) {

            $studentId = $prefix . str_pad($counter, 4, '0', STR_PAD_LEFT);
            $counter++;
            DB::table('students')->insert([
                'StudentId' => $studentId,
                'name' => $faker->name,
                'age' => $faker->numberBetween(18, 25),
                'Outlook_Email' => $faker->unique()->safeEmail,
                'Course_Strand' => 'BSIT',
                'Grade_Level_Section' => $faker->randomElement(['BSIT 101', 'BSIT 201']), // Adjusted section format
                'password' => Hash::make('password' . $i),
                'picture' => $faker->imageUrl(),
            ]);
        }
    }
}
