<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Updated to match the migration table name
    protected $table = 'students';

    // Updated to match the column names from the migration
    protected $fillable = [
        'StudentId', 'name', 'age', 'Outlook_Email', 'Course_Strand', 'Grade_Level_Section', 'password', 'picture'
    ];
}
