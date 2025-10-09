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
        Schema::create('pilihan_jurusans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('perguruan_tinggi1');
    $table->string('program_studi1');
    $table->string('perguruan_tinggi2')->nullable();
    $table->string('program_studi2')->nullable();
    $table->string('perguruan_tinggi3')->nullable();
    $table->string('program_studi3')->nullable();
    $table->string('perguruan_tinggi4')->nullable();
    $table->string('program_studi4')->nullable();
    $table->timestamps();
    
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan_jurusans');
    }
};
