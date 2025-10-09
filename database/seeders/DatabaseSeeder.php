<?php

namespace Database\Seeders;

use App\Models\PilihanJurusan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder yang lain di sini
        $this->call([
            UserSeeder::class,
            TryoutSeeder::class,
            TipeSubtesSeeder::class,
            SubtesSeeder::class,
            PilihanJurusanSeeder::class,
            SoalPilganSeeder::class,
            SoalEsaiSeeder::class,
        ]);
    }
}
