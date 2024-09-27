<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduleColumnsToBusyTimesTable extends Migration
{
    public function up()
    {
        Schema::table('busy_times', function (Blueprint $table) {
            if (!Schema::hasColumn('busy_times', 'schedule_from')) {
                $table->timestamp('schedule_from')->nullable();
            }
            if (!Schema::hasColumn('busy_times', 'schedule_to')) {
                $table->timestamp('schedule_to')->nullable();
            }
        });
    }
    
    public function down()
    {
        Schema::table('busy_times', function (Blueprint $table) {
            if (Schema::hasColumn('busy_times', 'schedule_from')) {
                $table->dropColumn('schedule_from');
            }
            if (Schema::hasColumn('busy_times', 'schedule_to')) {
                $table->dropColumn('schedule_to');
            }
        });
    }
    
}