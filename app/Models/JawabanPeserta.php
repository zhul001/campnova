<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPeserta extends Model
{
    use HasFactory;

    protected $table = 'jawaban_pesertas';

    protected $fillable = [
        'user_id',
        'tryout_id',
        'subtes_id',
        'soal_pilgan_id',
        'soal_esai_id',
        'jawaban',
        'is_correct',
        'waktu_pengerjaan',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    public function subtes()
    {
        return $this->belongsTo(Subtes::class);
    }

    public function soalPilgan()
    {
        return $this->belongsTo(SoalPilgan::class, 'soal_pilgan_id');
    }

    public function soalEsai()
    {
        return $this->belongsTo(Soalesai::class, 'soal_esai_id');
    }
}