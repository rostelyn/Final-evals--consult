<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hrcalendar extends Model
{
    protected $fillable = [
        'title', 'description', 'start', 'end'
    ];
}
