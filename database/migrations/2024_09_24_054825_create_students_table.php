<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('StudentId', 30)->unique(); // Unique Student ID with a max length of 30 characters
            $table->string('name', 50); // Name of the student, max length 50 characters
            $table->integer('age'); // Age of the student
            $table->string('Outlook_Email', 50)->unique(); // Unique email address, max length 50 characters
            $table->string('Course_Strand', 50); // Course or strand, max length 50 characters
            $table->string('Grade_Level_Section', 50); // Grade level and section, max length 50 characters
            $table->string('password'); // Password field (hashed), typically requires more space
            $table->timestamps(); // Adds created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students'); // Drop the table if rolling back the migration
    }
}
