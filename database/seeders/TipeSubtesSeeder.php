<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeSubtesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipe_subtes')->insert([
            [
                'nama_tipe' => 'Tes Potensi Skolastik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tipe' => 'Tes Literasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
