<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',               // Name of the person requesting the consultation
        'course',             // Course of the person
        'purpose',            // Purpose of the consultation
        'department',         // Department involved in the consultation
        'meeting_mode',       // Whether it's face-to-face or online
        'meeting_preference', // Additional details for online meetings (e.g., Google, Messenger)
        'schedule',           // Date and time of the consultation
        'status',             // Status of the consultation (pending, approved, declined)
        'decline_reason',     // Reason for declining the consultation, if applicable
    ];

    // Cast the 'schedule' field to a Carbon date instance
    protected $casts = [
        'schedule' => 'datetime', // Automatically convert 'schedule' to a Carbon instance
    ];

    // Relationships (optional): Add any additional relationships if needed
    // For example: A consultation might belong to a specific user or student
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Add any custom methods if needed, such as helpers for getting a formatted date/time
}
