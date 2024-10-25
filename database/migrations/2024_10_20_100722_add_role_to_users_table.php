<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Add the 'role' column to the existing 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('Hradmin'); // Default role can be set as Hradmin or any role you prefer
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Remove the 'role' column if this migration is rolled back
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
