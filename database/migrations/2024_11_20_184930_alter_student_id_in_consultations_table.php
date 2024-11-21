<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('consultations', 'student_id')) {
            Schema::table('consultations', function (Blueprint $table) {
                $table->unsignedBigInteger('student_id')->default(1)->change(); // Set default value if appropriate
            });
        }
    }

    public function down(): void
    {
        Schema::table('consultations', function (Blueprint $table) {
            // Reverse the change logic if necessary
        });
    }
};
