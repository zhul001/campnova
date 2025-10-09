<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanJurusan extends Model
{
    use HasFactory;

    protected $table = 'pilihan_jurusans';

    protected $fillable = [
        'user_id',
        'perguruan_tinggi1',
        'program_studi1',
        'perguruan_tinggi2',
        'program_studi2',
        'perguruan_tinggi3',
        'program_studi3',
        'perguruan_tinggi4',
        'program_studi4',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
