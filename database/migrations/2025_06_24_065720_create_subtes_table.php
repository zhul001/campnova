<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subtes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_subtes_id')->constrained('tipe_subtes')->onDelete('cascade');
            $table->string('judul_subtes');
            $table->integer('timer');
            $table->integer('jumlah_soal');
            $table->decimal('skor_maksimum', 10, 2)->comment('Nilai maksimum dari data UTBK');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtes');
    }
};
