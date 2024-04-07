<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    use HasFactory;

    public function media(): HasMany
    {
        return $this->hasMany(ListingMedia::class);
    }

    public function amenity(): HasMany
    {
        return $this->hasMany(ListingAmenityFeature::class);
    }
}
