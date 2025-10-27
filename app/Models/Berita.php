<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    /** @use HasFactory<\Database\Factories\BeritaFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
    ];

    public function gambars(): HasMany
    {
        return $this->hasMany(GambarBerita::class);
    }

    public function klasifikasis(): HasMany
    {
        return $this->hasMany(KlasifikasiBerita::class);
    }
}
