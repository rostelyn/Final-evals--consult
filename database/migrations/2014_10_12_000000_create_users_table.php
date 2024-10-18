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
            ['name' => 'Department Head', 'username' => 'dphead', 'password' => bcrypt('dpheadpassword')],
            ['name' => 'HR Admin', 'username' => 'hradmin', 'password' => bcrypt('hradminpassword')],
            ['name' => 'CT Admin', 'username' => 'ctadmin', 'password' => bcrypt('ctadminpassword')],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
