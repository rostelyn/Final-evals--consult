<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_evaluations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('subject');
            $table->text('teaching_performance');
            $table->text('library');
            $table->text('laboratory');
            $table->text('comfort_room');
            $table->text('canteen');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
