<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    protected $fillable = [
        'profile_id',
        'title',
        'slug',
        'destination',
        'thumbnail',
        'description',
        'meeting_point',
        'trip_type',
        'price',
        'quota',
        'booked',
        'start_date',
        'end_date',
        'status',
        'published'
    ];

    protected $casts = [
        'start_date'=>'date',
        'end_date'=>'date',
        'published'=>'boolean',
        'price'=>'decimal:0'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(
            TripGallery::class
        );
    }

    public function timelines(): HasMany
    {
        return $this->hasMany(
            TripTimeline::class
        );
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(
            Booking::class
        );
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(
            Testimonial::class
        );
    }

    public function getRemainingQuotaAttribute()
    {
        return $this->quota - $this->booked;
    }

    public function getQuotaStatusAttribute()
    {
        if ($this->booked >= $this->quota) {
            return 'full';
        }

        if (
            $this->booked >=
            ($this->quota * 0.8)
        ) {
            return 'few_slots';
        }

        return 'available';
    }
}