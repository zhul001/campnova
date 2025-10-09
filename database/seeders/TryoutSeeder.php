<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tryout;

class TryoutSeeder extends Seeder
{
    public function run(): void
    {
        Tryout::create([
            'id' => 1,
            'judul_paket' => 'Tryout UTBK-SNBT 1 2025',
            'tanggal_mulai' => '2025-06-01',
            'tanggal_selesai' => '2025-06-03',
        ]);

        Tryout::create([
        'id' => 2,
            'judul_paket' => 'Tryout UTBK-SNBT 2 2025',
            'tanggal_mulai' => '2025-06-10',
            'tanggal_selesai' => '2025-06-13',
        ]);

        Tryout::create([
            'id' => 3,
            'judul_paket' => 'Tryout UTBK-SNBT 3 2025',
            'tanggal_mulai' => '2025-06-20',
            'tanggal_selesai' => '2025-06-23',
        ]);
    }
}
