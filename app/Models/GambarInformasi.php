<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GambarInformasi extends Model
{
    /** @use HasFactory<\Database\Factories\GambarInformasiFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'informasi_id',
        'url'
    ];

    public function informasi(): BelongsTo
    {
        return $this->belongsTo(Informasi::class);
    }
}
