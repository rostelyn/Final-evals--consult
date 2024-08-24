<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Optional: Define the table name if it's not 'students'
    protected $table = 'students';

    // Ensure the correct fields are fillable
    protected $fillable = ['name', 'email', 'gender', 'student_number'];
}
