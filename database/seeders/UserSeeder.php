<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => 1,
            'nama_panjang' => 'zhul karnain',
            'nama_pendek' => 'nain',
            'email' => 'gamesope0001@gmail.com',
            'password' => Hash::make('01gamesope'),
            'tanggal_lahir' => '2007-01-27',
            'is_admin' => true,
        ]);

        User::create([
            'id' => 2,
            'nama_panjang' => 'yusuf akhsan',
            'nama_pendek' => 'yusuf',
            'email' => 'gamesope0002@gmail.com',
            'password' => Hash::make('02gamesope'),
            'tanggal_lahir' => '2021-01-28',
            'is_admin' => false,
        ]);

        User::create([
            'id' => 3,
            'nama_panjang' => 'muhammad faizal',
            'nama_pendek' => 'faizal',
            'email' => 'gamesope0003@gmail.com',
            'password' => Hash::make('03gamesope'),
            'tanggal_lahir' => '2001-06-13',
            'is_admin' => false,
        ]);
    }
}