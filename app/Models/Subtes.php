<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtes extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_subtes',
        'nama_subtes',
        'timer',
        'jumlah_soal'
    ];

    public function tipeSubtes()
    {
        return $this->belongsTo(TipeSubtes::class, 'tipe_subtes_id');
    }

    public function jawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::class);
    }

    public function hasilSubtes()
    {
        return $this->hasMany(HasilSubtes::class);
    }

    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }
}
