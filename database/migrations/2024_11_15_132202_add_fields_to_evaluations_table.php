<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            // Add 'status' column if it doesn't already exist
            if (!Schema::hasColumn('evaluations', 'status')) {
                $table->string('status')->default('pending')->after('canteen');
            }

            // Add 'student_id' column if it doesn't already exist
            if (!Schema::hasColumn('evaluations', 'student_id')) {
                $table->unsignedBigInteger('student_id')->nullable()->after('id');
            }

            // Add foreign key to 'student_id' (optional, based on your database design)
            if (Schema::hasColumn('evaluations', 'student_id') && Schema::hasTable('students')) {
                $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            // Remove 'status' column if it exists
            if (Schema::hasColumn('evaluations', 'status')) {
                $table->dropColumn('status');
            }

            // Remove 'student_id' column and its foreign key if they exist
            if (Schema::hasColumn('evaluations', 'student_id')) {
                $table->dropForeign(['student_id']);
                $table->dropColumn('student_id');
            }
        });
    }
}
