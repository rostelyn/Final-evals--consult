<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations to assign roles to existing users.
     *
     * @return void
     */
    public function up(): void
    {
        // Assign roles based on username or other criteria
        DB::table('users')->where('username', 'dphead')->update(['role' => 'DepartmentHead']);
        DB::table('users')->where('username', 'hradmin')->update(['role' => 'Hradmin']);
        DB::table('users')->where('username', 'ctadmin')->update(['role' => 'Ctadmin']);
    }

    /**
     * Reverse the migrations (optional).
     *
     * @return void
     */
    public function down(): void
    {
        // Optionally revert the role assignments
        DB::table('users')->where('username', 'dphead')->update(['role' => '']);
        DB::table('users')->where('username', 'hradmin')->update(['role' => '']);
        DB::table('users')->where('username', 'ctadmin')->update(['role' => '']);
    }
};
