<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; // Ensure this is imported
use Illuminate\Support\Facades\DB; // Import the DB facade

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Create default admin accounts
        DB::table('users')->insert([
            ['name' => 'CSDepartment Head', 'username' => 'ComputerDepartment', 'password' => bcrypt('Csheadpassword')],
            ['name' => 'Department Head1', 'username' => 'EngineeringDepartment', 'password' => bcrypt('Engineeringhead')],
            ['name' => 'Department Head2', 'username' => 'HospitalityManagementDepartment', 'password' => bcrypt('Hmheadpassword')],
            ['name' => 'Department Head3', 'username' => 'TesdaDepartment', 'password' => bcrypt('Tesdahead')],
            ['name' => 'Department Head4', 'username' => 'HighschoolDepartment', 'password' => bcrypt('Hsheadpassword')],
            ['name' => 'HR Admin', 'username' => 'Hradmin', 'password' => bcrypt('Hradminpassword')],
            ['name' => 'CT Admin', 'username' => 'Ctadmin', 'password' => bcrypt('Ctadminpassword')],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
