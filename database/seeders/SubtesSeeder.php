<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubtesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subtes')->insert([
            [
                'id' => 1,
                'tipe_subtes_id' => 1,
                'judul_subtes' => 'Penalaran Umum',
                'timer' => 1800,
                'jumlah_soal' => 30,
                'skor_maksimum' => 800.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'tipe_subtes_id' => 1,
                'judul_subtes' => 'Pemahaman dan Pengetahuan Umum',
                'timer' => 900,
                'jumlah_soal' => 20,
                'skor_maksimum' => 850.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'tipe_subtes_id' => 1,
                'judul_subtes' => 'Pemahaman Bacaan dan Menulis',
                'timer' => 1500,
                'jumlah_soal' => 20,
                'skor_maksimum' => 850.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'tipe_subtes_id' => 1,
                'judul_subtes' => 'Pengetahuan Kuantitatif',
                'timer' => 1200,
                'jumlah_soal' => 20,
                'skor_maksimum' => 1000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'tipe_subtes_id' => 2,
                'judul_subtes' => 'Literasi Bahasa Indonesia',
                'timer' => 2550,
                'jumlah_soal' => 30,
                'skor_maksimum' => 870.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'tipe_subtes_id' => 2,
                'judul_subtes' => 'Literasi Bahasa Inggris',
                'timer' => 1200,
                'jumlah_soal' => 20,
                'skor_maksimum' => 880.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'tipe_subtes_id' => 2,
                'judul_subtes' => 'Penalaran Matematika',
                'timer' => 2550,
                'jumlah_soal' => 20,
                'skor_maksimum' => 1000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
