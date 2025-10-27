<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KlasifikasiTravel extends Model
{
    /** @use HasFactory<\Database\Factories\KlasifikasiTravelFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'travel_id',
        'master_klasifikasi_travel_id',
    ];

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function masterKlasifikasi(): BelongsTo
    {
        return $this->belongsTo(MasterKlasifikasiTravel::class, 'master_klasifikasi_travel_id');
    }
}
