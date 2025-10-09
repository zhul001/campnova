<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tryout extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_paket',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_active', // Tambahkan field ini
    ];

    protected $casts = [
        'is_active' => 'boolean', // Cast sebagai boolean
    ];

    public function jawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::class);
    }

    public function hasilSubtes()
    {
        return $this->hasMany(HasilSubtes::class);
    }

    public function hasilTryouts()
    {
        return $this->hasMany(HasilTryout::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'jawaban_pesertas')
                   ->withTimestamps();
    }

    public function subtes()
    {
        return $this->hasMany(Subtes::class);
    }
}