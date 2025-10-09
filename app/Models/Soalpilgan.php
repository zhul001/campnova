<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soalpilgan extends Model
{
    use HasFactory;

    protected $table = 'soal_pilgans';

    protected $fillable = [
        'tryout_id',
        'subtes_id',
        'nomor_soal',
        'soal',
        'soal_gambar',

        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'jawaban_e',

        'kunci_jawaban'
    ];

    public function jawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::class, 'soal_pilgan_id');
    }
}
