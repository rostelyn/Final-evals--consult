<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('StudentId')->unique();
            $table->string('name');
            $table->integer('age');
            $table->string('Outlook_Email')->unique();
            $table->string('Course_Strand');
            $table->string('Grade_Level_Section');
            $table->string('password');
            $table->string('picture')->nullable(); // For storing the image
            $table->timestamps();
        });
    }    

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
