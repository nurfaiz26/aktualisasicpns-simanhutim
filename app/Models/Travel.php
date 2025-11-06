<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Travel extends Model
{
    /** @use HasFactory<\Database\Factories\TravelFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kota_id',
        'rating',
        'jumlah_pelanggaran',
        'alamat',
        'nama',
        'no_telepon',
        'email',
        'direktur',
        'no_sk',
        'akreditasi',
        'status',
        'tgl_sk',
        'tgl_akreditasi_awal',
        'tgl_akreditasi_akhir',
        'gmap_place_id',
        'gmap_url'
    ];

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }

    public function laporans(): HasMany
    {
        return $this->hasMany(LaporanTravel::class);
    }

    public function gambars(): HasMany
    {
        return $this->hasMany(GambarTravel::class);
    }

    public function klasifikasis(): HasMany
    {
        return $this->hasMany(KlasifikasiTravel::class);
    }

    public function komentarGoogles(): HasMany
    {
        return $this->hasMany(KomentarGoogleTravel::class);
    }
}
