<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyScheduleColumnsInBusyTimesTable extends Migration
{
    public function up()
    {
        Schema::table('busy_times', function (Blueprint $table) {
            // Change schedule_from and schedule_to to proper timestamps and allow null
            $table->timestamp('schedule_from')->nullable()->change();
            $table->timestamp('schedule_to')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('busy_times', function (Blueprint $table) {
            // Optionally, reverse changes if needed
            $table->string('schedule_from')->change();
            $table->string('schedule_to')->change();
        });
    }
}
