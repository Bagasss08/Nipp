<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TripTimeline extends Model
{
    protected $fillable = [
        'trip_id',
        'day',
        'title',
        'description'
    ];

    public function trip(): BelongsTo
    {
        return $this->belongsTo(
            Trip::class
        );
    }
}