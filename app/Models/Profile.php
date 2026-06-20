<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    protected $fillable = [
        'brand_name',
        'owner_name',
        'logo',
        'banner',
        'description',
        'email',
        'whatsapp',
        'instagram',
        'tiktok',
        'youtube'
    ];

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}