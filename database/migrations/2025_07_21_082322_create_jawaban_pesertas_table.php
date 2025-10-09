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
        Schema::create('jawaban_pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tryout_id')->constrained('tryouts')->onDelete('cascade');
            $table->foreignId('subtes_id')->constrained('subtes')->onDelete('cascade');
            $table->foreignId('soal_pilgan_id')->nullable()->constrained('soal_pilgans')->onDelete('cascade');
            $table->foreignId('soal_esai_id')->nullable()->constrained('esais')->onDelete('cascade');
            $table->string('jawaban')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->integer('waktu_pengerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_pesertas');
    }
};
