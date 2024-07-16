<?php

// app/Models/Evaluation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_name',
        'subject',
        'teaching_performance',
        'library',
        'laboratory',
        'comfort_room',
        'canteen',
    ];
}
