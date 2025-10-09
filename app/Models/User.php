<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_panjang',
        'nama_pendek',
        'tanggal_lahir',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi hasMany ke PilihanJurusan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pilihanJurusan()
    {
        return $this->hasOne(PilihanJurusan::class);
    }

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

    public function tryouts()
    {
        return $this->belongsToMany(Tryout::class, 'jawaban_pesertas')
                   ->withTimestamps();
    }
}
