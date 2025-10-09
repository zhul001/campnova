<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipeSubtes extends Model
{
    protected $table = 'tipe_subtes';
    
    protected $fillable = [
        'nama_tipe'
    ];

    // Relasi ke Subtes (satu tipe bisa memiliki banyak subtes)
    public function subtes(): HasMany
    {
        return $this->hasMany(Subtes::class, 'tipe_subtes_id');
    }
}