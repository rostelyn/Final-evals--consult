<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasColumn('consultations', 'decline_reason')) {
        Schema::table('consultations', function (Blueprint $table) {
            $table->string('decline_reason')->nullable()->after('status');
        });
    }
}

    


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn('decline_reason');
        });
    }
};
