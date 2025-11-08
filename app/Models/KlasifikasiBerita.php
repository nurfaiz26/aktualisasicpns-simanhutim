<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KlasifikasiBerita extends Model
{
    /** @use HasFactory<\Database\Factories\KlasifikasiBeritaFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'berita_id',
        'master_klasifikasi_berita_id'
    ];

    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class)->where('status', 'aktif');
    }

    public function masterKlasifikasi(): BelongsTo
    {
        return $this->belongsTo(MasterKlasifikasiBerita::class, 'master_klasifikasi_berita_id');
    }
}
