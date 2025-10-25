<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Informasi extends Model
{
    /** @use HasFactory<\Database\Factories\InformasiFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
    ];

    public function gambars():HasMany
    {
        return $this->hasMany(GambarInformasi::class);
    }

    public function klasifikasis():HasMany
    {
        return $this->hasMany(KlasifikasiInformasi::class);
    }
}
