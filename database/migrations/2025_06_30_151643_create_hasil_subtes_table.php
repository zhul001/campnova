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
        Schema::create('hasil_subtes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tryout_id')->constrained('tryouts')->onDelete('cascade');
            $table->foreignId('subtes_id')->constrained('subtes')->onDelete('cascade');
            $table->integer('benar');
            $table->integer('salah');
            $table->integer('tidak_diisi');
            $table->decimal('score', 10, 2)->comment('Skor = (benar/jumlah_soal) * skor_maksimum_subtes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_subtes');
    }
};
