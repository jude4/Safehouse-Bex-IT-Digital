<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ListingMedia extends Model
{
    use HasFactory;

    public function mediaImage(): HasMany
    {
        return $this->hasMany(ListingMediaImage::class);
    }
}
