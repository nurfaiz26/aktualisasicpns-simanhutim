<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterKlasifikasiInformasi extends Model
{
    /** @use HasFactory<\Database\Factories\MasterKlasifikasiInformasiFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama'
    ];
}
