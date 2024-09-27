<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusyTime extends Model
{
    protected $fillable = [
        'schedule_from',   // Start time of the busy event
        'schedule_to',     // End time of the busy event
        'reason',          // Reason for marking the time as busy
        'is_all_day',      // Boolean to mark if the event covers the entire day
    ];

    // Cast the 'is_all_day' field to boolean
    protected $casts = [
        'is_all_day' => 'boolean',
        'schedule_from' => 'datetime',  // Ensures schedule_from is treated as a Carbon instance
        'schedule_to' => 'datetime',    // Ensures schedule_to is treated as a Carbon instance
    ];

    // Define any additional relationships or methods here if needed
}
