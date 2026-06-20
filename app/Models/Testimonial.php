<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    protected $fillable = [
        'trip_id',
        'name',
        'photo',
        'rating',
        'comment'
    ];

    public function trip(): BelongsTo
    {
        return $this->belongsTo(
            Trip::class
        );
    }
}