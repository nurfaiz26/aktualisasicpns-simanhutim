<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanTravel extends Model
{
    /** @use HasFactory<\Database\Factories\LaporanTravelFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'travel_id',
        'user_data_id',
        'deskripsi',
        'link_bukti',
        'status'
    ];

    public function travel(): BelongsTo
    {
        return $this->belongsTo(Travel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
