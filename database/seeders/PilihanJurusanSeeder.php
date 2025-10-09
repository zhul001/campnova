<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PilihanJurusan;

class PilihanJurusanSeeder extends Seeder
{
    public function run(): void
    {
        PilihanJurusan::create([
            'user_id' => 1,
            'perguruan_tinggi1' => 'Universitas Indonesia',
            'program_studi1' => 'Teknik Informatika',
            'perguruan_tinggi2' => null,
            'program_studi2' => null,
            'perguruan_tinggi3' => null,
            'program_studi3' => null,
            'perguruan_tinggi4' => null,
            'program_studi4' => null,
        ]);

        PilihanJurusan::create([
            'user_id' => 2,
            'perguruan_tinggi1' => 'Universitas Indonesia',
            'program_studi1' => 'Teknik Informatika',
            'perguruan_tinggi2' => null,
            'program_studi2' => null,
            'perguruan_tinggi3' => null,
            'program_studi3' => null,
            'perguruan_tinggi4' => null,
            'program_studi4' => null,
        ]);

        PilihanJurusan::create([
            'user_id' => 3,
            'perguruan_tinggi1' => 'Universitas Indonesia',
            'program_studi1' => 'Teknik Informatika',
            'perguruan_tinggi2' => null,
            'program_studi2' => null,
            'perguruan_tinggi3' => null,
            'program_studi3' => null,
            'perguruan_tinggi4' => null,
            'program_studi4' => null,
        ]);
    }
}