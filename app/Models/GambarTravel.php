<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GambarTravel extends Model
{
    /** @use HasFactory<\Database\Factories\GambarTravelFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'url',
        'travel_id',
    ];

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }
}
