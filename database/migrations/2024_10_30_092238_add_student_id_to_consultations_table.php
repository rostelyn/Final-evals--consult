<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            if (!Schema::hasColumn('consultations', 'student_id')) {
                $table->bigInteger('student_id')->unsigned()->nullable()->after('status');
            }
        });
    }
    
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            if (Schema::hasColumn('consultations', 'student_id')) {
                $table->dropColumn('student_id');
            }
        });
    }
    
};
