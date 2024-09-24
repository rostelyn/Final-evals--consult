<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'register_table'; 

    protected $fillable = [
        'student_id', 'name', 'age', 'email', 'course', 'grade', 'password', 'picture'
    ];
}
