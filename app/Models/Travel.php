<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    ];

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }

    public function laporan(): BelongsTo
    {
        return $this->belongsTo(LaporanTravel::class);
    }
}
