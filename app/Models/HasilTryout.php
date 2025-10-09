<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTryout extends Model
{
    use HasFactory;

            protected $table = 'hasil_tryouts';

            protected $fillable = [
                'user_id',
                'tryout_id',
                'total_benar',
                'total_salah',
                'total_tidak_diisi',
                'total_score'
            ];

    protected $casts = [
        'total_score' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    public function hasilSubtes()
    {
        return $this->hasMany(HasilSubtes::class, 'tryout_id', 'tryout_id')
                   ->where('user_id', $this->user_id);
    }
}