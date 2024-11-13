<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'StudentId',
        'name',
        'age',
        'Outlook_Email',
        'level',
        'Course_Strand',
        'Grade_Level_Section',
        'gender',
        'password',
        'picture',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
