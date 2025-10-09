<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soalesai extends Model
{
    use HasFactory;

    protected $table = 'esais';

    protected $fillable = [
        'tryout_id',
        'subtes_id',
        'nomor_soal',
        'soal',
        'soal_gambar',
        'kunci_jawaban'
    ];

    public function jawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::class, 'soal_esai_id');
    }
}