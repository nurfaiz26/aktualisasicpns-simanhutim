<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserData extends Model
{
    /** @use HasFactory<\Database\Factories\UserDataFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'kota_id',
        'nama',
        'no_telepon',
        'no_ktp',
        'alamat',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }
}
