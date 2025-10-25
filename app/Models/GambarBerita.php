<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GambarBerita extends Model
{
    /** @use HasFactory<\Database\Factories\GambarBeritaFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'url',
        'berita_id'
    ];

    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class);
    }
}
