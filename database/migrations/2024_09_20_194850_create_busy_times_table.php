<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusyTimesTable extends Migration
{
    public function up()
    {
        Schema::create('busy_times', function (Blueprint $table) {
            $table->id();
            $table->timestamp('schedule_from')->nullable();   // Start time for the busy period
            $table->timestamp('schedule_to')->nullable();     // End time for the busy period
            $table->boolean('is_all_day')->default(false);    // Indicates if the entire day is busy
            $table->text('reason')->nullable();               // Reason for the busy period (Make sure this line is present)
            $table->timestamps();                             // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('busy_times');
    }
}
