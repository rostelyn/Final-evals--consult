<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->string('decline_reason')->nullable(); // Make sure it's nullable
        });
    }
    
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn('decline_reason');
        });
    }
    
};
