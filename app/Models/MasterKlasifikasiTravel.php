<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterKlasifikasiTravel extends Model
{
    /** @use HasFactory<\Database\Factories\MasterKlasifikasiTravelFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama'
    ];

    public function klasifikasis(): HasMany
    {
        return $this->hasMany(KlasifikasiTravel::class);
    }
}
