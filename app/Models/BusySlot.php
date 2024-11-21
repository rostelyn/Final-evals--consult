<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// BusySlot model
class BusySlot extends Model
{
    protected $fillable = [
        'consultation_id',
        'title',
        'description',
        'date',
        'busy_times',
    ];

    // Convert busy_times from string to array when accessed
    protected $casts = [
        'busy_times' => 'array', // Automatically cast to array when accessed
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

