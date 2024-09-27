<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonToBusyTimesTable extends Migration
{
    public function up()
    {
        Schema::table('busy_times', function (Blueprint $table) {
            if (!Schema::hasColumn('busy_times', 'reason')) {
                $table->text('reason')->nullable();
            }
        });
    }
    
    public function down()
    {
        Schema::table('busy_times', function (Blueprint $table) {
            if (Schema::hasColumn('busy_times', 'reason')) {
                $table->dropColumn('reason');
            }
        });
    }
}   
