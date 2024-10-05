<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'StudentId',
        'name',
        'age',
        'Outlook_Email',
        'Course_Strand',
        'Grade_Level_Section',
        'password',
        'picture',
    ];

    public $incrementing = false;
}
