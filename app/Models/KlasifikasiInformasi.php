<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class KlasifikasiInformasi extends Model
{
    /** @use HasFactory<\Database\Factories\KlasifikasiInformasiFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'informasi_id',
        'master_klasifikasi_informasi_id'
    ];

    public function informasi(): BelongsTo
    {
        return $this->belongsTo(Informasi::class);
    }

    public function masterKlasifikasi(): BelongsTo
    {
        return $this->belongsTo(MasterKlasifikasiInformasi::class, 'master_klasifikasi_informasi_id');
    }
}
