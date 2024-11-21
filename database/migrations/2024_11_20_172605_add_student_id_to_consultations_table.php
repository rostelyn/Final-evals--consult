<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('consultations', 'student_id')) {
            Schema::table('consultations', function (Blueprint $table) {
                $table->unsignedBigInteger('student_id')->after('id');
            });
        }
    }

    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn('student_id');
        });
    }
};
