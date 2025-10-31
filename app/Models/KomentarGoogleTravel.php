<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KomentarGoogleTravel extends Model
{
    /** @use HasFactory<\Database\Factories\KomentarGoogleTravelFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'travel_id',
        'author_name',
        'rating',
        'text',
        'time',
    ];

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }
}
