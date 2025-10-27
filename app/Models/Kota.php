<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    /** @use HasFactory<\Database\Factories\KotaFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'provinsi_id',
        'nama'
    ];

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function userData(): HasMany
    {
        return $this->hasMany(UserData::class);
    }
}
