<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterKlasifikasiBerita extends Model
{
    /** @use HasFactory<\Database\Factories\MasterKlasifikasiBeritaFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama'
    ];

    public function klasifikasis():HasMany
    {
        return $this->hasMany(KlasifikasiBerita::class);
    }
}
