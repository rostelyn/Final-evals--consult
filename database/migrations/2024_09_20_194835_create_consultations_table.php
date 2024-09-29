<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name');                           // Name of the person
            $table->string('course');                         // Course of the person
            $table->string('purpose');                        // Purpose of the consultation
            $table->string('department');                     // Department for the consultation
            $table->string('meeting_mode');                   // Face-to-face or Online
            $table->string('meeting_preference')->nullable(); // Preferred platform if Online
            $table->dateTime('schedule');                     // Date and time of the consultation
            $table->string('status')->default('pending');     // Status (pending, approved, declined)
            $table->string('decline_reason')->nullable();     // Reason if the consultation was declined
            $table->timestamps();                             // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
