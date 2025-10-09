<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSubtes extends Model
{
    use HasFactory;

    protected $table = 'hasil_subtes';

    protected $fillable = [
        'user_id',
        'tryout_id',
        'subtes_id',
        'benar',
        'salah',
        'tidak_diisi',
        'score'
    ];

    protected $casts = [
        'score' => 'decimal:2',
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

    public function hasilTryout()
    {
        return $this->belongsTo(HasilTryout::class, 'tryout_id', 'tryout_id')
                   ->where('user_id', $this->user_id);
    }
}